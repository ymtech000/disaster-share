<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class FollowTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    
    public function testPostFollow()
    {
        #フォローテスト
        $userA = factory(User::class)->create();
        $userB = factory(User::class)->create();

        $response = $this->actingAs($userA);
        $response->post('/users/'.$userB->id.'/follow');
        $response->assertDatabaseHas('user_follow', [
            'follow_id' => $userB->id,
        ]);

        $response->delete('/users/'.$userB->id.'/unfollow');
        $response->assertDatabaseMissing('user_follow', [
            'follow_id' => $userB->id,
        ]);
    }

    public function testDisplayFollowingUsers() 
    {   
        $userA = factory(User::class)->create();
        $userB = factory(User::class)->create();

        $response = $this->actingAs($userA);
        $response->post('/users/'.$userB->id.'/follow');

        $response = $response->get('/users/'.$userA->id.'/followings');

        $response->assertSeeText($userB->name);
    }

    public function testDisplayFollowers() 
    {   
        $userA = factory(User::class)->create();
        $userB = factory(User::class)->create();

        $response = $this->actingAs($userB);
        $response->post('/users/'.$userA->id.'/follow');
        $response = $this->actingAs($userA);
        $response = $response->get('/users/'.$userA->id.'/followers');

        $response->assertSeeText($userB->name);
    }

}
