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
            'name' => 'testuser',
            'email' => 'test0000@example.com',
            'password' => 'test0000',
            'current_password' => 'test0000',
            'image' => '画像',
            'introduction' => 'あいうえおかきくけこさしすせそたちつてとなにぬねの',
        ];

        $response = $this->json('POST', route('register'), $data);

        $user = User::first();
        $this->assertEquals($data['name'], $user->name);

        $response
            ->assertStatus(201)
            ->assertJson(['name' => $user->name]);
    }
  
}
