<?php namespace Tests\Repositories;

use App\Models\kecamatan;
use App\Repositories\kecamatanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class kecamatanRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var kecamatanRepository
     */
    protected $kecamatanRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->kecamatanRepo = \App::make(kecamatanRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_kecamatan()
    {
        $kecamatan = factory(kecamatan::class)->make()->toArray();

        $createdkecamatan = $this->kecamatanRepo->create($kecamatan);

        $createdkecamatan = $createdkecamatan->toArray();
        $this->assertArrayHasKey('id', $createdkecamatan);
        $this->assertNotNull($createdkecamatan['id'], 'Created kecamatan must have id specified');
        $this->assertNotNull(kecamatan::find($createdkecamatan['id']), 'kecamatan with given id must be in DB');
        $this->assertModelData($kecamatan, $createdkecamatan);
    }

    /**
     * @test read
     */
    public function test_read_kecamatan()
    {
        $kecamatan = factory(kecamatan::class)->create();

        $dbkecamatan = $this->kecamatanRepo->find($kecamatan->id);

        $dbkecamatan = $dbkecamatan->toArray();
        $this->assertModelData($kecamatan->toArray(), $dbkecamatan);
    }

    /**
     * @test update
     */
    public function test_update_kecamatan()
    {
        $kecamatan = factory(kecamatan::class)->create();
        $fakekecamatan = factory(kecamatan::class)->make()->toArray();

        $updatedkecamatan = $this->kecamatanRepo->update($fakekecamatan, $kecamatan->id);

        $this->assertModelData($fakekecamatan, $updatedkecamatan->toArray());
        $dbkecamatan = $this->kecamatanRepo->find($kecamatan->id);
        $this->assertModelData($fakekecamatan, $dbkecamatan->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_kecamatan()
    {
        $kecamatan = factory(kecamatan::class)->create();

        $resp = $this->kecamatanRepo->delete($kecamatan->id);

        $this->assertTrue($resp);
        $this->assertNull(kecamatan::find($kecamatan->id), 'kecamatan should not exist in DB');
    }
}
