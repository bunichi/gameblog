<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class HtttpTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * 基本的な機能テストの例
     *
     * @return void
     */
    public function testTopTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testHomeTest()
    {
        // ログイン前はログインページにリダイレクトされる
        $response = $this->get('/home');
        $response->assertStatus(302);

        // ログイン後は200
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)
                         ->withSession(['foo' => 'bar'])
                         ->get('/home');
        $response->assertStatus(200);
    }

    public function testRegisterTest()
    {
        // ログイン前はログインページにリダイレクトされる
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

}