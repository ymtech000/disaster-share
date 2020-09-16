<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AlertTest extends TestCase
{
        /**
         * A basic test example.
         *
         * @return void
         */
        public function testCreateAlert()
        {
            $user = factory(\App\User::class)->create();
    
            $response = $this->actingAs($user)
                ->json('POST', route('alerts.create'), [
                    'content' => '状況',
                    'title' => 'タイトル',
                    'image' => '画像',
                    'area' => 'わからない',
                    'location' => 'その場所',
                    'time' => '2020/01/01 12:00',
                    'lat' => '35',
                    'lng' => '135'
            ]);

            // レスポンスが201(CREATED)であること
            $response->assertStatus(201);
        }

        public function testErrorCreateAlert()
        {
            $user = factory(\App\User::class)->create();
    
            $response = $this->actingAs($user)
                ->json('POST', route('alerts.create'), [
                    'title' => '',
                    'content' => '',
                    'image' => '画像',
                    'area' => 'わからない',
                    'location' => 'その場所',
                    'time' => '2020/01/01 12:00',
                    'lat' => '35',
                    'lng' => '135'
            ]);
            $response->assertStatus(422);
        }


        public function testUpdateAlert()
        {
            $user = factory(\App\User::class)->create();
            $alert = factory(\App\Alert::class)->create();
    
            $response = $this->actingAs($user)->json('POST', route('alerts.update',['alert' => $alert]), [
                    'content' => '状況',
                    'title' => 'タイトル',
                    'image' => '画像',
                    'area' => 'わからない',
                    'location' => 'その場所',
                    'time' => '2020/01/01 12:00',
                    'lat' => '35',
                    'lng' => '135'
            ]);

            // レスポンスが201(CREATED)であること
            $response->assertStatus(201);
        }
    
}
