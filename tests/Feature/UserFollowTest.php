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
        $followers = factory(User::class,5)->create();
        $follow_id = $followers[0]->id;
        $user_id = DB::table('user_follow')->where('follow_id', $follow_id)->first()->user_id;
        dd($user_id);
        $following_user = User::find($user_id);

        $response = $this->actingAs($following_user);
        $response = $response->get('/users/'.$user_id.'/following');

        foreach($followers as $follower) {
            $response->assertSeeText($follower->name);
        }

    }
}
