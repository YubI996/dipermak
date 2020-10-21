<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\jenKeg;

class jenKegApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_jen_keg()
    {
        $jenKeg = factory(jenKeg::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/jen_kegs', $jenKeg
        );

        $this->assertApiResponse($jenKeg);
    }

    /**
     * @test
     */
    public function test_read_jen_keg()
    {
        $jenKeg = factory(jenKeg::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/jen_kegs/'.$jenKeg->id
        );

        $this->assertApiResponse($jenKeg->toArray());
    }

    /**
     * @test
     */
    public function test_update_jen_keg()
    {
        $jenKeg = factory(jenKeg::class)->create();
        $editedjenKeg = factory(jenKeg::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/jen_kegs/'.$jenKeg->id,
            $editedjenKeg
        );

        $this->assertApiResponse($editedjenKeg);
    }

    /**
     * @test
     */
    public function test_delete_jen_keg()
    {
        $jenKeg = factory(jenKeg::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/jen_kegs/'.$jenKeg->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/jen_kegs/'.$jenKeg->id
        );

        $this->response->assertStatus(404);
    }
}
