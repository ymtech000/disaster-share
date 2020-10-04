<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegisterTest()
    {
        $data = [
            'name' => 'テストユーザー',
            'email' => 'test123@example.com',
            'passwosrd' => 'test0000',
            'current_password' => 'test0000',
            'image' => '画像',
            'introduction' => 'あいうえおかきくけこさしすせそたちつてとなにぬねの',
        ];

        $response = $this->json('POST', route('signup.post'), $data);

        $response->assertStatus(200);
    }
  
}
