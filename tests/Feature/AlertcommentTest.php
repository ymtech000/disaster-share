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
        $user = factory(User::class)->create();
        $alertcomment = factory(Alertcomment::class)->create();

        $response = $this->actingAs($user);

        $data = [
            'comment' => $alertcomment->comment,
        ];

        $response->post('/alertcomments',$data);
        $response->assertDatabaseHas('alertcomments',$data);
    }
}