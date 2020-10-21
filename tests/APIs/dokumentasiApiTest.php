<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\dokumentasi;

class dokumentasiApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_dokumentasi()
    {
        $dokumentasi = factory(dokumentasi::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/dokumentasis', $dokumentasi
        );

        $this->assertApiResponse($dokumentasi);
    }

    /**
     * @test
     */
    public function test_read_dokumentasi()
    {
        $dokumentasi = factory(dokumentasi::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/dokumentasis/'.$dokumentasi->id
        );

        $this->assertApiResponse($dokumentasi->toArray());
    }

    /**
     * @test
     */
    public function test_update_dokumentasi()
    {
        $dokumentasi = factory(dokumentasi::class)->create();
        $editeddokumentasi = factory(dokumentasi::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/dokumentasis/'.$dokumentasi->id,
            $editeddokumentasi
        );

        $this->assertApiResponse($editeddokumentasi);
    }

    /**
     * @test
     */
    public function test_delete_dokumentasi()
    {
        $dokumentasi = factory(dokumentasi::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/dokumentasis/'.$dokumentasi->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/dokumentasis/'.$dokumentasi->id
        );

        $this->response->assertStatus(404);
    }
}
