<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\partisipasi;

class partisipasiApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_partisipasi()
    {
        $partisipasi = factory(partisipasi::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/partisipasis', $partisipasi
        );

        $this->assertApiResponse($partisipasi);
    }

    /**
     * @test
     */
    public function test_read_partisipasi()
    {
        $partisipasi = factory(partisipasi::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/partisipasis/'.$partisipasi->id
        );

        $this->assertApiResponse($partisipasi->toArray());
    }

    /**
     * @test
     */
    public function test_update_partisipasi()
    {
        $partisipasi = factory(partisipasi::class)->create();
        $editedpartisipasi = factory(partisipasi::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/partisipasis/'.$partisipasi->id,
            $editedpartisipasi
        );

        $this->assertApiResponse($editedpartisipasi);
    }

    /**
     * @test
     */
    public function test_delete_partisipasi()
    {
        $partisipasi = factory(partisipasi::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/partisipasis/'.$partisipasi->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/partisipasis/'.$partisipasi->id
        );

        $this->response->assertStatus(404);
    }
}
