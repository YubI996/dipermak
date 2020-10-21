<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\kelurahan;

class kelurahanApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_kelurahan()
    {
        $kelurahan = factory(kelurahan::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/kelurahans', $kelurahan
        );

        $this->assertApiResponse($kelurahan);
    }

    /**
     * @test
     */
    public function test_read_kelurahan()
    {
        $kelurahan = factory(kelurahan::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/kelurahans/'.$kelurahan->id
        );

        $this->assertApiResponse($kelurahan->toArray());
    }

    /**
     * @test
     */
    public function test_update_kelurahan()
    {
        $kelurahan = factory(kelurahan::class)->create();
        $editedkelurahan = factory(kelurahan::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/kelurahans/'.$kelurahan->id,
            $editedkelurahan
        );

        $this->assertApiResponse($editedkelurahan);
    }

    /**
     * @test
     */
    public function test_delete_kelurahan()
    {
        $kelurahan = factory(kelurahan::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/kelurahans/'.$kelurahan->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/kelurahans/'.$kelurahan->id
        );

        $this->response->assertStatus(404);
    }
}
