<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Alertcomment;

class AlertcommentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function testCreateAlertcomment()
    {
        $alertcomment = factory(Alertcomment::class)->create();
        $user = User::find($alertcomment->user_id);

        $response = $this->actingAs($user);

        $data = [
            'comment' => $alertcomment->comment,
        ];

        $response->post('/alertcomments',$data);
        $response->assertDatabaseHas('alertcomments',$data);
    }

    public function testDeleteAlertcomment()
    {
        $alertcomment = factory(Alertcomment::class)->create();
        $user = User::find($alertcomment->user_id);

        $response = $this->actingAs($user);

        $data = [
            'comment' => $alertcomment->comment,
        ];

        $response->delete('/alertcomments/'.$alertcomment->id,$data);
        $response->assertDatabaseMissing('alertcomments', [
            'id' => $alertcomment->id,
        ]);
    }
}