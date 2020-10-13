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
        $following_user = factory(User::class)->create();
        $follower = factory(User::class)->create();
        $user_id = $following_user->id;
        $follow_id = $follower->id;

        $response = $this->actingAs($following_user);
        $response = $response->get('/users/'.$user_id.'/followings');

        $response->assertSeeText($follower->name);
    }

}
