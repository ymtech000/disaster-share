<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function testDisplayUsers() 
    {   
        $user = factory(User::class)->create();

        $response = $this->actingAs($user);

        $response = $response->get('/users');

        $response->assertSeeText($user->name);
    }

    public function testUpdateUser()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user);

        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
            'introduction' => $user->introduction,
        ];
        $response->post('/users/'.$user->id,$data);
        $response->assertDatabaseHas('users', $data);
    }

    public function testDeleteUser()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user);

        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
            'introduction' => $user->introduction,
        ];
        $response->delete('/users/'.$user->id,$data);
        $response->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }
}
