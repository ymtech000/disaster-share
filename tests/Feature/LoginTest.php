<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    protected $user;

    public function setUp(): void
    {
        parent::setUp();

        // テストユーザ作成
        $this->user = factory(User::class)->create();
    }

    public function testLogin(): void
    {
        $response = $this->json('POST', route('login.post'), [
            'email' => $this->user->email,
            'password' => 'test0000',
        ]);
            // dd($response);
        $response
            ->assertStatus(302);
            // ->assertJson(['name' => $this->user->name]);

        $this->assertAuthenticatedAs($this->user);
    }

    public function testLogout(): void
    {
        // actingAsヘルパで現在認証済みのユーザーを指定する
        $response = $this->actingAs($this->user);

        // ログアウトページへリクエストを送信
        $response->json('POST', route('logout.get'));

        // ログアウト後のレスポンスで、HTTPステータスコードが正常であることを確認
        $response->assertStatus(302);

        // ユーザーが認証されていないことを確認
        $this->assertGuest();
    }
}
