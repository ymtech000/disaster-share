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
        $user = factory(User::class)->create();

        $alert = factory(Alert::class)->create();

        $response = $this->actingAs($user);

        $data = [
            'title' => $alert->title,
            'content' => $alert->content,
            'location' => $alert->location,
            'area' => $alert->area,
            'lat' => $alert->lat,
            'lng' => $alert->lng,
        ];
        $response->post('/alerts',$data);
        $response->assertDatabaseHas('alerts', $data);
    }
}

