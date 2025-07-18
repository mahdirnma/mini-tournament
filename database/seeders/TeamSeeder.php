<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Team::create([
             'title' => 'team1',
             'description' => 'lorem ipsum1',
         ]);
         Team::create([
             'title' => 'team2',
             'description' => 'lorem ipsum2',
         ]);
         Team::create([
             'title' => 'team3',
             'description' => 'lorem ipsum3',
         ]);
         Team::create([
             'title' => 'team4',
             'description' => 'lorem ipsum4',
         ]);
         Team::create([
             'title' => 'team5',
             'description' => 'lorem ipsum5',
         ]);
         Team::create([
             'title' => 'team6',
             'description' => 'lorem ipsum6',
         ]);
         Team::create([
             'title' => 'team7',
             'description' => 'lorem ipsum7',
         ]);
         Team::create([
             'title' => 'team8',
             'description' => 'lorem ipsum8',
         ]);
         Team::create([
             'title' => 'team9',
             'description' => 'lorem ipsum9',
         ]);
         Team::create([
             'title' => 'team10',
             'description' => 'lorem ipsum10',
         ]);
    }
}
