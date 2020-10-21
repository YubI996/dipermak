<?php namespace Tests\Repositories;

use App\Models\jenKeg;
use App\Repositories\jenKegRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class jenKegRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var jenKegRepository
     */
    protected $jenKegRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->jenKegRepo = \App::make(jenKegRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_jen_keg()
    {
        $jenKeg = factory(jenKeg::class)->make()->toArray();

        $createdjenKeg = $this->jenKegRepo->create($jenKeg);

        $createdjenKeg = $createdjenKeg->toArray();
        $this->assertArrayHasKey('id', $createdjenKeg);
        $this->assertNotNull($createdjenKeg['id'], 'Created jenKeg must have id specified');
        $this->assertNotNull(jenKeg::find($createdjenKeg['id']), 'jenKeg with given id must be in DB');
        $this->assertModelData($jenKeg, $createdjenKeg);
    }

    /**
     * @test read
     */
    public function test_read_jen_keg()
    {
        $jenKeg = factory(jenKeg::class)->create();

        $dbjenKeg = $this->jenKegRepo->find($jenKeg->id);

        $dbjenKeg = $dbjenKeg->toArray();
        $this->assertModelData($jenKeg->toArray(), $dbjenKeg);
    }

    /**
     * @test update
     */
    public function test_update_jen_keg()
    {
        $jenKeg = factory(jenKeg::class)->create();
        $fakejenKeg = factory(jenKeg::class)->make()->toArray();

        $updatedjenKeg = $this->jenKegRepo->update($fakejenKeg, $jenKeg->id);

        $this->assertModelData($fakejenKeg, $updatedjenKeg->toArray());
        $dbjenKeg = $this->jenKegRepo->find($jenKeg->id);
        $this->assertModelData($fakejenKeg, $dbjenKeg->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_jen_keg()
    {
        $jenKeg = factory(jenKeg::class)->create();

        $resp = $this->jenKegRepo->delete($jenKeg->id);

        $this->assertTrue($resp);
        $this->assertNull(jenKeg::find($jenKeg->id), 'jenKeg should not exist in DB');
    }
}
