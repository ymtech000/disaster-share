<?php

namespace Tests\Feature;

use App\User;
use Storage;
use Illuminate\Http\UploadedFile;
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
    use RefreshDatabase;

    public function testRegisterTest()
    {
        $factory_user = factory(User::class)->create();

        Storage::fake('local');

        $file = UploadedFile::fake()->image('dummy.jpg', 800, 800);

        $email = 'test1234@example.com';

        $data = [
            'name' => $factory_user->name,
            'email' => $email,
            'password' =>  $factory_user->password,
            'password_confirmation' =>  $factory_user->password,
            'thefile' => $file,
            'introduction' => $factory_user->introduction,
        ];
       
        $response = $this->json('POST', route('signup.post'), $data);
        dd($response->content());
        $response -> assertStatus(201);
    }
  
}

