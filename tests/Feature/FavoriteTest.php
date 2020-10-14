<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Alert;

class FavoriteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function testPostFavorite()
    {
        #いいねーテスト
        $user = factory(User::class)->create();
        $alert = factory(Alert::class)->create();

        $response = $this->actingAs($user);
        $response->post('/alerts/'.$alert->id.'/favorite');
        $response->assertDatabaseHas('favorites', [
            'alert_id' => $alert->id,
        ]);

        $response->delete('/alerts/'.$alert->id.'/unfavorite');
        $response->assertDatabaseMissing('favorites', [
            'alert_id' => $alert->id,
        ]);
    }

    public function testDisplayFavorites() 
    {   
        $user = factory(User::class)->create();
        $alert = factory(Alert::class)->create();

        $response = $this->actingAs($user);
        $response->post('/alerts/'.$alert->id.'/favorite');

        $response = $response->get('/users/'.$user->id.'/favorites');

        $response->assertSeeText($alert->title);
    }
}
