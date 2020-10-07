<?php

namespace Tests\Feature;

use App\User;
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
        $factory_user = factory(User::class)->create();
        $data = [
            'id' => $factory_user->id,
            'name' => $factory_user->name,
            'email' => $factory_user->email,
            'password' =>  $factory_user->password,
            'current_password' =>  $factory_user->password,
            'image' => $factory_user->file,
            'introduction' => $factory_user->introduction,
        ];
        // dd($data);
        $response = $this->json('POST', route('signup.post'), $data);

        $response -> assertStatus(201);
    }
  
}
