<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use DB;

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
        $userA = factory(User::class)->create();
        $userB = factory(User::class)->create();
        $user_id = $userA->id;
        $follow_id = $userB->id;
        $following_user = User::find($user_id);
        $follower = User::find($follow_id);

        $response = $this->actingAs($following_user);
        $response = $response->get('/users/'.$user_id.'/following');

        $response->assertSeeText($follower->name);
    }

}
