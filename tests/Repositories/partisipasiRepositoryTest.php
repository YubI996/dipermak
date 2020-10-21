<?php namespace Tests\Repositories;

use App\Models\partisipasi;
use App\Repositories\partisipasiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class partisipasiRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var partisipasiRepository
     */
    protected $partisipasiRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->partisipasiRepo = \App::make(partisipasiRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_partisipasi()
    {
        $partisipasi = factory(partisipasi::class)->make()->toArray();

        $createdpartisipasi = $this->partisipasiRepo->create($partisipasi);

        $createdpartisipasi = $createdpartisipasi->toArray();
        $this->assertArrayHasKey('id', $createdpartisipasi);
        $this->assertNotNull($createdpartisipasi['id'], 'Created partisipasi must have id specified');
        $this->assertNotNull(partisipasi::find($createdpartisipasi['id']), 'partisipasi with given id must be in DB');
        $this->assertModelData($partisipasi, $createdpartisipasi);
    }

    /**
     * @test read
     */
    public function test_read_partisipasi()
    {
        $partisipasi = factory(partisipasi::class)->create();

        $dbpartisipasi = $this->partisipasiRepo->find($partisipasi->id);

        $dbpartisipasi = $dbpartisipasi->toArray();
        $this->assertModelData($partisipasi->toArray(), $dbpartisipasi);
    }

    /**
     * @test update
     */
    public function test_update_partisipasi()
    {
        $partisipasi = factory(partisipasi::class)->create();
        $fakepartisipasi = factory(partisipasi::class)->make()->toArray();

        $updatedpartisipasi = $this->partisipasiRepo->update($fakepartisipasi, $partisipasi->id);

        $this->assertModelData($fakepartisipasi, $updatedpartisipasi->toArray());
        $dbpartisipasi = $this->partisipasiRepo->find($partisipasi->id);
        $this->assertModelData($fakepartisipasi, $dbpartisipasi->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_partisipasi()
    {
        $partisipasi = factory(partisipasi::class)->create();

        $resp = $this->partisipasiRepo->delete($partisipasi->id);

        $this->assertTrue($resp);
        $this->assertNull(partisipasi::find($partisipasi->id), 'partisipasi should not exist in DB');
    }
}
