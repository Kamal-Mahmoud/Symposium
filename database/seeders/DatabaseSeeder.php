<?php

namespace Database\Seeders;

use App\Models\Conference;
use App\Models\Talk;
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
        $users = User::factory(5)->create();
        Talk::factory(10)
            ->recycle($users)
            ->create();
        Conference::factory(5)->create();    
    }
}

/*
        $talks = Talk::factory(5)->create();
        User::factory()
            ->hasAttached($talks)
            ->create([
                'name' => 'Kamal ELhmamy',
                'email' => 'kamalm7moud95@gmail.com',
            ]);

        User::factory()
            ->has(Talk::factory()->count(5))
            ->create([
                'name' => 'Kamal ELhmamy',
                'email' => 'kamalm7moud95@gmail.com',
            ]);

*/
