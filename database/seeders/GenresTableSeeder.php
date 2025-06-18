<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            ['name' => 'Action'],
            ['name' => 'Adventure'],
            ['name' => 'Role-Playing'],
            ['name' => 'Simulation'],
            ['name' => 'Strategy'],
            ['name' => 'Shooter'],
            ['name' => 'Puzzle'],
            ['name' => 'Platformer'],
            ['name' => 'Fighting'],
            ['name' => 'Racing'],
            ['name' => 'Sports'],
            ['name' => 'Stealth'],
            ['name' => 'Horror'],
            ['name' => 'Survival'],
            ['name' => 'Open World'],
            ['name' => 'Sandbox'],
            ['name' => 'MMORPG'],
            ['name' => 'Roguelike'],
            ['name' => 'Turn-Based'],
            ['name' => 'Real-Time Strategy'],
            ['name' => 'Metroidvania'],
            ['name' => 'Rhythm'],
            ['name' => 'Card Game'],
            ['name' => 'Idle'],
            ['name' => 'Party Game'],
            ['name' => 'Battle Royale'],
            ['name' => 'Visual Novel'],
            ['name' => 'Interactive Story'],
        ];

        foreach ($genres as $genre) {
            $newGenre = new Genre();
            $newGenre->name = $genre['name'];
            $newGenre->save();
        }
    }
}
