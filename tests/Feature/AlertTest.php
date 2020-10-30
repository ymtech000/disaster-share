<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\User;
use App\Alert;
use Storage;

class AlertTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function testCreateAlert()
    {
        $alert = factory(Alert::class)->create();
        $user = User::find($alert->id);

        $response = $this->actingAs($user);

        $data = [
            'title' => $alert->title,
            'content' => $alert->content,
            'location' => $alert->location,
            'area' => $alert->area,
            'city' => $alert->city,
            'lat' => $alert->lat,
            'lng' => $alert->lng,
        ];
        $response->post('/alerts',$data);
        $response->assertDatabaseHas('alerts', $data);
    }

    public function testDeleteAlert()
    {
        $alert = factory(Alert::class)->create();
        $user = User::find($alert->user_id);

        $response = $this->actingAs($user);

        $data = [
            'title' => $alert->title,
            'content' => $alert->content,
            'location' => $alert->location,
            'area' => $alert->area,
            'city' => $alert->city,
            'lat' => $alert->lat,
            'lng' => $alert->lng,
        ];

        $response->delete('/alerts/'.$alert->id,$data);
        $response->assertDatabaseMissing('alerts', [
            'id' => $alert->id,
        ]);
    }

    public function testDisplayAlerts() 
    {   
        $alert = factory(Alert::class)->create();
        $user= User::find($alert->user_id);

        $response = $this->actingAs($user);
        $data = [
            'title' => $alert->title,
            'content' => $alert->content,
            'location' => $alert->location,
            'area' => $alert->area,
            'city' => $alert->city,
            'lat' => $alert->lat,
            'lng' => $alert->lng,
        ];
        $response->post('/alerts',$data);
        $response = $response->get('/users/'.$user->id);

        $response->assertSeeText($alert->title);
    }

    public function testUpdateAlert()
    {
        $alert = factory(Alert::class)->create();
        $user = User::find($alert->user_id);

        $response = $this->actingAs($user);

        $data = [
            'title' => $alert->title,
            'content' => $alert->content,
            'location' => $alert->location,
            'area' => $alert->area,
            'city' => $alert->city,
            'lat' => $alert->lat,
            'lng' => $alert->lng,
        ];
        $response->post('/alerts/'.$alert->id,$data);
        $response->assertDatabaseHas('alerts', $data);
    }
}

