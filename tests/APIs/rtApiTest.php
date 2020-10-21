<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\rt;

class rtApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_rt()
    {
        $rt = factory(rt::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/rts', $rt
        );

        $this->assertApiResponse($rt);
    }

    /**
     * @test
     */
    public function test_read_rt()
    {
        $rt = factory(rt::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/rts/'.$rt->id
        );

        $this->assertApiResponse($rt->toArray());
    }

    /**
     * @test
     */
    public function test_update_rt()
    {
        $rt = factory(rt::class)->create();
        $editedrt = factory(rt::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/rts/'.$rt->id,
            $editedrt
        );

        $this->assertApiResponse($editedrt);
    }

    /**
     * @test
     */
    public function test_delete_rt()
    {
        $rt = factory(rt::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/rts/'.$rt->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/rts/'.$rt->id
        );

        $this->response->assertStatus(404);
    }
}
