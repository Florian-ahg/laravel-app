<?php

namespace Database\Seeders;

use App\Models\Contrat;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Florian',
            'email' => 'flo@mail.com',
        ]);

        Contrat::factory(25)->create();
    }
}
