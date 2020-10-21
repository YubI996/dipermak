<?php namespace Tests\Repositories;

use App\Models\kegiatan;
use App\Repositories\kegiatanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class kegiatanRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var kegiatanRepository
     */
    protected $kegiatanRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->kegiatanRepo = \App::make(kegiatanRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_kegiatan()
    {
        $kegiatan = factory(kegiatan::class)->make()->toArray();

        $createdkegiatan = $this->kegiatanRepo->create($kegiatan);

        $createdkegiatan = $createdkegiatan->toArray();
        $this->assertArrayHasKey('id', $createdkegiatan);
        $this->assertNotNull($createdkegiatan['id'], 'Created kegiatan must have id specified');
        $this->assertNotNull(kegiatan::find($createdkegiatan['id']), 'kegiatan with given id must be in DB');
        $this->assertModelData($kegiatan, $createdkegiatan);
    }

    /**
     * @test read
     */
    public function test_read_kegiatan()
    {
        $kegiatan = factory(kegiatan::class)->create();

        $dbkegiatan = $this->kegiatanRepo->find($kegiatan->id);

        $dbkegiatan = $dbkegiatan->toArray();
        $this->assertModelData($kegiatan->toArray(), $dbkegiatan);
    }

    /**
     * @test update
     */
    public function test_update_kegiatan()
    {
        $kegiatan = factory(kegiatan::class)->create();
        $fakekegiatan = factory(kegiatan::class)->make()->toArray();

        $updatedkegiatan = $this->kegiatanRepo->update($fakekegiatan, $kegiatan->id);

        $this->assertModelData($fakekegiatan, $updatedkegiatan->toArray());
        $dbkegiatan = $this->kegiatanRepo->find($kegiatan->id);
        $this->assertModelData($fakekegiatan, $dbkegiatan->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_kegiatan()
    {
        $kegiatan = factory(kegiatan::class)->create();

        $resp = $this->kegiatanRepo->delete($kegiatan->id);

        $this->assertTrue($resp);
        $this->assertNull(kegiatan::find($kegiatan->id), 'kegiatan should not exist in DB');
    }
}
