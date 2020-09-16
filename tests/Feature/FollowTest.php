<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FollowTest extends TestCase
{
    public function testPostFollow()
    {
        #フォローテスト
        $factory_userA = factory(\App\User::class)->create();
        $factory_userB = factory(\App\User::class)->create();
        $user_idA= $factory_userA->id;
        $user_idB= $factory_userB->id;

        $response = $this->actingAs($factory_userA);
        $response->post("/users/{$user_idB}/follow");
        $response->assertDatabaseHas('users', [
            'following_id' => $user_idA,
            'followed_id' => $user_idB
        ]);

        $response->delete("/users/{$user_idB}/follow");
        $response->assertDatabaseMissing('users', [
            'following_id' => $user_idA,
            'followed_id' => $user_idB
        ]);
    }
}
