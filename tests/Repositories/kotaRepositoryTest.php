<?php namespace Tests\Repositories;

use App\Models\kota;
use App\Repositories\kotaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class kotaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var kotaRepository
     */
    protected $kotaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->kotaRepo = \App::make(kotaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_kota()
    {
        $kota = factory(kota::class)->make()->toArray();

        $createdkota = $this->kotaRepo->create($kota);

        $createdkota = $createdkota->toArray();
        $this->assertArrayHasKey('id', $createdkota);
        $this->assertNotNull($createdkota['id'], 'Created kota must have id specified');
        $this->assertNotNull(kota::find($createdkota['id']), 'kota with given id must be in DB');
        $this->assertModelData($kota, $createdkota);
    }

    /**
     * @test read
     */
    public function test_read_kota()
    {
        $kota = factory(kota::class)->create();

        $dbkota = $this->kotaRepo->find($kota->id);

        $dbkota = $dbkota->toArray();
        $this->assertModelData($kota->toArray(), $dbkota);
    }

    /**
     * @test update
     */
    public function test_update_kota()
    {
        $kota = factory(kota::class)->create();
        $fakekota = factory(kota::class)->make()->toArray();

        $updatedkota = $this->kotaRepo->update($fakekota, $kota->id);

        $this->assertModelData($fakekota, $updatedkota->toArray());
        $dbkota = $this->kotaRepo->find($kota->id);
        $this->assertModelData($fakekota, $dbkota->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_kota()
    {
        $kota = factory(kota::class)->create();

        $resp = $this->kotaRepo->delete($kota->id);

        $this->assertTrue($resp);
        $this->assertNull(kota::find($kota->id), 'kota should not exist in DB');
    }
}
