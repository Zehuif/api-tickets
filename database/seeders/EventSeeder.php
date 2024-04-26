<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $event = new Event();

        $event->nombre = 'Evento1';
        $event->artista = 'Artista1';
        $event->informacion = 'Informacion1';
        $event->precio = 2000;
        $event->inicio_evento = '2024-04-28 01:46:18';
        $event->duracion = 1;
        $event->capacidad = 100;

        $event->save();

        $event = new Event();

        $event->nombre = 'Evento2';
        $event->artista = 'Artista2';
        $event->informacion = 'Informacion2';
        $event->precio = 3000;
        $event->inicio_evento = '2024-04-29 01:46:18';
        $event->duracion = 3;
        $event->capacidad = 3;

        $event->save();

    }
}
