<?php namespace Tests\Repositories;

use App\Models\user;
use App\Repositories\userRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class userRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var userRepository
     */
    protected $userRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->userRepo = \App::make(userRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_user()
    {
        $user = factory(user::class)->make()->toArray();

        $createduser = $this->userRepo->create($user);

        $createduser = $createduser->toArray();
        $this->assertArrayHasKey('id', $createduser);
        $this->assertNotNull($createduser['id'], 'Created user must have id specified');
        $this->assertNotNull(user::find($createduser['id']), 'user with given id must be in DB');
        $this->assertModelData($user, $createduser);
    }

    /**
     * @test read
     */
    public function test_read_user()
    {
        $user = factory(user::class)->create();

        $dbuser = $this->userRepo->find($user->id);

        $dbuser = $dbuser->toArray();
        $this->assertModelData($user->toArray(), $dbuser);
    }

    /**
     * @test update
     */
    public function test_update_user()
    {
        $user = factory(user::class)->create();
        $fakeuser = factory(user::class)->make()->toArray();

        $updateduser = $this->userRepo->update($fakeuser, $user->id);

        $this->assertModelData($fakeuser, $updateduser->toArray());
        $dbuser = $this->userRepo->find($user->id);
        $this->assertModelData($fakeuser, $dbuser->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_user()
    {
        $user = factory(user::class)->create();

        $resp = $this->userRepo->delete($user->id);

        $this->assertTrue($resp);
        $this->assertNull(user::find($user->id), 'user should not exist in DB');
    }
}
