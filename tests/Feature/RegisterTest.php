<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    
    
        public function registerTest()
        {
            $data = [
                'name' => 'テストユーザー',
                'email' => 'test123@example.com',
                'passwosrd' => 'test0000',
                'image' => '画像',
            ];

            $response = $this->json('POST', route('signup.post'), $data);

            $response->assertStatus(201);
        }
  
}
