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
            'image' => $file,
            'time' => $now,
        ];

        $response->post('/alerts',$data);
        $response->assertDatabaseHas('alerts', [
            'image' => $file,
            'title' => $alert->title,
            'content' => $alert->content,
            'location' => $alert->location,
            'lat' => $alert->lat,
            'lng' => $alert->lng,
            'time' => $now,
        ]);
    }
    
    // public function testUpdateAlertTest()
    // {
    //     $factory_user = factory(User::class)->create();

    //     $response = $this->actingAs($factory_user);

    //     Storage::fake('local');

    //     $file = UploadedFile::fake()->image('dummy.jpg', 800, 800);

    //     //時間のセット
    //     date_default_timezone_set('Asia/Tokyo');
    //     $now = date("Y/m/d H:i");

    //     $response->post('/alerts', ['title' => $testTitle, 'content' => $testContent, 'location' => $testLocation,]);
    //     $response->assertDatabaseHas('alerts', [
    //         'image' => $file,
    //         'title' => $testTitle,
    //         'content' => $testContent,
    //         'location' => $testLocation,
    //         'time' => $now,
    //     ]);
    // }
}

