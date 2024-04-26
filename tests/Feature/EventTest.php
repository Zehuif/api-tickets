<?php

namespace Tests\Feature;

use Database\Seeders\EventSeeder;
use Illuminate\Database\Console\Migrations\StatusCommand;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    // public function test_events_retrived_successfully(): void
    // {
    //     $this->seed(EventSeeder::class);
    //     $response = $this->get('api/v1/events');     
        
    //     //dd($response);

    //     $response->assertStatus(200);
    // }
}
