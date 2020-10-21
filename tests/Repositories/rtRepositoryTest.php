<?php namespace Tests\Repositories;

use App\Models\rt;
use App\Repositories\rtRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class rtRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var rtRepository
     */
    protected $rtRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->rtRepo = \App::make(rtRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_rt()
    {
        $rt = factory(rt::class)->make()->toArray();

        $createdrt = $this->rtRepo->create($rt);

        $createdrt = $createdrt->toArray();
        $this->assertArrayHasKey('id', $createdrt);
        $this->assertNotNull($createdrt['id'], 'Created rt must have id specified');
        $this->assertNotNull(rt::find($createdrt['id']), 'rt with given id must be in DB');
        $this->assertModelData($rt, $createdrt);
    }

    /**
     * @test read
     */
    public function test_read_rt()
    {
        $rt = factory(rt::class)->create();

        $dbrt = $this->rtRepo->find($rt->id);

        $dbrt = $dbrt->toArray();
        $this->assertModelData($rt->toArray(), $dbrt);
    }

    /**
     * @test update
     */
    public function test_update_rt()
    {
        $rt = factory(rt::class)->create();
        $fakert = factory(rt::class)->make()->toArray();

        $updatedrt = $this->rtRepo->update($fakert, $rt->id);

        $this->assertModelData($fakert, $updatedrt->toArray());
        $dbrt = $this->rtRepo->find($rt->id);
        $this->assertModelData($fakert, $dbrt->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_rt()
    {
        $rt = factory(rt::class)->create();

        $resp = $this->rtRepo->delete($rt->id);

        $this->assertTrue($resp);
        $this->assertNull(rt::find($rt->id), 'rt should not exist in DB');
    }
}
