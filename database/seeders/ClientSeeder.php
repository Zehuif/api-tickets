<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $client = new Client();

        $client->nombre = 'Cliente1';
        $client->mail = 'Mail1';
        $client->telefono = 1234567890;
        
        $client->save();
    }
}
