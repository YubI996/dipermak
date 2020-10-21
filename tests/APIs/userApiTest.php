<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\user;

class userApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_user()
    {
        $user = factory(user::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/users', $user
        );

        $this->assertApiResponse($user);
    }

    /**
     * @test
     */
    public function test_read_user()
    {
        $user = factory(user::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/users/'.$user->id
        );

        $this->assertApiResponse($user->toArray());
    }

    /**
     * @test
     */
    public function test_update_user()
    {
        $user = factory(user::class)->create();
        $editeduser = factory(user::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/users/'.$user->id,
            $editeduser
        );

        $this->assertApiResponse($editeduser);
    }

    /**
     * @test
     */
    public function test_delete_user()
    {
        $user = factory(user::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/users/'.$user->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/users/'.$user->id
        );

        $this->response->assertStatus(404);
    }
}
