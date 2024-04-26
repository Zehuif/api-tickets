<?php

namespace Tests\Unit;

use App\Models\Event;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\EventSeeder;
use Tests\TestCase;

class EventTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_view_events(): void
    {
        $response = $this->get('api/v1/events');

        $response->assertStatus(200);
    }

    public function test_view_event_by_id(): void
    {
        

        $response = $this->get('api/v1/event/1');

        //dd($response);

        $response->assertStatus(200);
    }

    public function test_purchase_successful(): void
    {
        //$this->seed(DatabaseSeeder::class);
        

        $response = $this->post('api/v1/purchase', [
            'event_id' => 10,
            'client_id' => 1,
            'metodo_pago' => 'Tarjeta de credito',
        ]);

        //dd($response);

        $response->assertStatus(200);
    }
}
