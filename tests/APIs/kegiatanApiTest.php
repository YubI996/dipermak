<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\kegiatan;

class kegiatanApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_kegiatan()
    {
        $kegiatan = factory(kegiatan::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/kegiatans', $kegiatan
        );

        $this->assertApiResponse($kegiatan);
    }

    /**
     * @test
     */
    public function test_read_kegiatan()
    {
        $kegiatan = factory(kegiatan::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/kegiatans/'.$kegiatan->id
        );

        $this->assertApiResponse($kegiatan->toArray());
    }

    /**
     * @test
     */
    public function test_update_kegiatan()
    {
        $kegiatan = factory(kegiatan::class)->create();
        $editedkegiatan = factory(kegiatan::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/kegiatans/'.$kegiatan->id,
            $editedkegiatan
        );

        $this->assertApiResponse($editedkegiatan);
    }

    /**
     * @test
     */
    public function test_delete_kegiatan()
    {
        $kegiatan = factory(kegiatan::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/kegiatans/'.$kegiatan->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/kegiatans/'.$kegiatan->id
        );

        $this->response->assertStatus(404);
    }
}
