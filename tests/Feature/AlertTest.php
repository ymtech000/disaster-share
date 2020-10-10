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

        Storage::fake('local');

        $file = UploadedFile::fake()->image('dummy.jpg', 800, 800);

        //時間のセット
        date_default_timezone_set('Asia/Tokyo');
        $now = date("Y/m/d H:i");

        $data = [
            'title' => $alert->title,
            'content' => $alert->content,
            'location' => $alert->location,
            'area' => 'わからない',
            'lat' => $alert->lat,
            'lng' => $alert->lng,
            // 'image' => $file,
            // 'time' => $now,
        ];
        $response->post('/alerts',$data);
        $response->assertDatabaseHas('alerts', $data);
    }
    
    // public function testUpdateAlert()
    // {
    //     $user = factory(User::class)->create();

    //     $alert = factory(Alert::class)->create();

    //     $response = $this->actingAs($user);

    //     Storage::fake('local');

    //     $file = UploadedFile::fake()->image('dummy.jpg', 800, 800);

    //     //時間のセット
    //     date_default_timezone_set('Asia/Tokyo');
    //     $now = date("Y/m/d H:i");
    //     // dd($now);

    //     $data = [
    //         'title' => $alert->title,
    //         'content' => $alert->content,
    //         'location' => $alert->location,
    //         'area' => 'わからない',
    //         'lat' => $alert->lat,
    //         'lng' => $alert->lng,
    //         'image' => $file,
    //         'time' => $now,
    //     ];
    //     dd($data);
    //     $response->post('/alerts',$data);
    //     $response->assertDatabaseHas('alerts', $data);
    // }
}

