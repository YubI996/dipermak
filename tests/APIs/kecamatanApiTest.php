<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\kecamatan;

class kecamatanApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_kecamatan()
    {
        $kecamatan = factory(kecamatan::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/kecamatans', $kecamatan
        );

        $this->assertApiResponse($kecamatan);
    }

    /**
     * @test
     */
    public function test_read_kecamatan()
    {
        $kecamatan = factory(kecamatan::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/kecamatans/'.$kecamatan->id
        );

        $this->assertApiResponse($kecamatan->toArray());
    }

    /**
     * @test
     */
    public function test_update_kecamatan()
    {
        $kecamatan = factory(kecamatan::class)->create();
        $editedkecamatan = factory(kecamatan::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/kecamatans/'.$kecamatan->id,
            $editedkecamatan
        );

        $this->assertApiResponse($editedkecamatan);
    }

    /**
     * @test
     */
    public function test_delete_kecamatan()
    {
        $kecamatan = factory(kecamatan::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/kecamatans/'.$kecamatan->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/kecamatans/'.$kecamatan->id
        );

        $this->response->assertStatus(404);
    }
}
