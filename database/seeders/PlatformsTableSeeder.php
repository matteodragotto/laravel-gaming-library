<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $platforms = [
            ['name' => 'PC', 'color' => '#0078D7'],               // Blu Windows (molto usato)
            ['name' => 'PlayStation 5', 'color' => '#003791'],    // Blu PlayStation
            ['name' => 'PlayStation 4', 'color' => '#003791'],    // Blu PlayStation (simile a PS5)
            ['name' => 'Xbox Series X', 'color' => '#107C10'],    // Verde Xbox
            ['name' => 'Xbox One', 'color' => '#107C10'],         // Verde Xbox (simile a Series X)
            ['name' => 'Nintendo Switch', 'color' => '#E60012'],  // Rosso Nintendo
            ['name' => 'Steam', 'color' => '#171A21'],            // Nero/grigio Steam
            ['name' => 'Epic Games Store', 'color' => '#313131'], // Grigio scuro Epic
            ['name' => 'GOG', 'color' => '#FF6B00'],              // Arancione GOG
            ['name' => 'iOS', 'color' => '#999999'],               // Grigio Apple (neutro)
            ['name' => 'Android', 'color' => '#3DDC84'],          // Verde Android
            ['name' => 'Mac', 'color' => '#A2AAAD'],               // Grigio Apple Mac
            ['name' => 'Linux', 'color' => '#FCC624'],             // Giallo Linux (Tux)
            ['name' => 'PlayStation 3', 'color' => '#003791'],    // Blu PlayStation
            ['name' => 'Xbox 360', 'color' => '#107C10'],         // Verde Xbox
            ['name' => 'Wii U', 'color' => '#62B5E5'],            // Azzurro Nintendo
            ['name' => 'Wii', 'color' => '#8B8B8B'],              // Grigio neutro
            ['name' => 'PlayStation Vita', 'color' => '#003791'], // Blu PlayStation
            ['name' => 'Nintendo 3DS', 'color' => '#E60012'],     // Rosso Nintendo
            ['name' => 'Browser', 'color' => '#FF9500'],          // Arancione Browser
        ];


        foreach ($platforms as $platform) {
            $newPlatform = new Platform();

            $newPlatform->name = $platform['name'];
            $newPlatform->color = $platform['color'];
            $newPlatform->save();
        }
    }
}
