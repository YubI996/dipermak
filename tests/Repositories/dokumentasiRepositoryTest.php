<?php namespace Tests\Repositories;

use App\Models\dokumentasi;
use App\Repositories\dokumentasiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class dokumentasiRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var dokumentasiRepository
     */
    protected $dokumentasiRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->dokumentasiRepo = \App::make(dokumentasiRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_dokumentasi()
    {
        $dokumentasi = factory(dokumentasi::class)->make()->toArray();

        $createddokumentasi = $this->dokumentasiRepo->create($dokumentasi);

        $createddokumentasi = $createddokumentasi->toArray();
        $this->assertArrayHasKey('id', $createddokumentasi);
        $this->assertNotNull($createddokumentasi['id'], 'Created dokumentasi must have id specified');
        $this->assertNotNull(dokumentasi::find($createddokumentasi['id']), 'dokumentasi with given id must be in DB');
        $this->assertModelData($dokumentasi, $createddokumentasi);
    }

    /**
     * @test read
     */
    public function test_read_dokumentasi()
    {
        $dokumentasi = factory(dokumentasi::class)->create();

        $dbdokumentasi = $this->dokumentasiRepo->find($dokumentasi->id);

        $dbdokumentasi = $dbdokumentasi->toArray();
        $this->assertModelData($dokumentasi->toArray(), $dbdokumentasi);
    }

    /**
     * @test update
     */
    public function test_update_dokumentasi()
    {
        $dokumentasi = factory(dokumentasi::class)->create();
        $fakedokumentasi = factory(dokumentasi::class)->make()->toArray();

        $updateddokumentasi = $this->dokumentasiRepo->update($fakedokumentasi, $dokumentasi->id);

        $this->assertModelData($fakedokumentasi, $updateddokumentasi->toArray());
        $dbdokumentasi = $this->dokumentasiRepo->find($dokumentasi->id);
        $this->assertModelData($fakedokumentasi, $dbdokumentasi->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_dokumentasi()
    {
        $dokumentasi = factory(dokumentasi::class)->create();

        $resp = $this->dokumentasiRepo->delete($dokumentasi->id);

        $this->assertTrue($resp);
        $this->assertNull(dokumentasi::find($dokumentasi->id), 'dokumentasi should not exist in DB');
    }
}
