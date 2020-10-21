<?php namespace Tests\Repositories;

use App\Models\kelurahan;
use App\Repositories\kelurahanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class kelurahanRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var kelurahanRepository
     */
    protected $kelurahanRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->kelurahanRepo = \App::make(kelurahanRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_kelurahan()
    {
        $kelurahan = factory(kelurahan::class)->make()->toArray();

        $createdkelurahan = $this->kelurahanRepo->create($kelurahan);

        $createdkelurahan = $createdkelurahan->toArray();
        $this->assertArrayHasKey('id', $createdkelurahan);
        $this->assertNotNull($createdkelurahan['id'], 'Created kelurahan must have id specified');
        $this->assertNotNull(kelurahan::find($createdkelurahan['id']), 'kelurahan with given id must be in DB');
        $this->assertModelData($kelurahan, $createdkelurahan);
    }

    /**
     * @test read
     */
    public function test_read_kelurahan()
    {
        $kelurahan = factory(kelurahan::class)->create();

        $dbkelurahan = $this->kelurahanRepo->find($kelurahan->id);

        $dbkelurahan = $dbkelurahan->toArray();
        $this->assertModelData($kelurahan->toArray(), $dbkelurahan);
    }

    /**
     * @test update
     */
    public function test_update_kelurahan()
    {
        $kelurahan = factory(kelurahan::class)->create();
        $fakekelurahan = factory(kelurahan::class)->make()->toArray();

        $updatedkelurahan = $this->kelurahanRepo->update($fakekelurahan, $kelurahan->id);

        $this->assertModelData($fakekelurahan, $updatedkelurahan->toArray());
        $dbkelurahan = $this->kelurahanRepo->find($kelurahan->id);
        $this->assertModelData($fakekelurahan, $dbkelurahan->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_kelurahan()
    {
        $kelurahan = factory(kelurahan::class)->create();

        $resp = $this->kelurahanRepo->delete($kelurahan->id);

        $this->assertTrue($resp);
        $this->assertNull(kelurahan::find($kelurahan->id), 'kelurahan should not exist in DB');
    }
}
