<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = [
            [
                'title' => 'The Legend of Zelda: Breath of the Wild',
                'release_date' => '2017-03-03',
                'developer' => 'Nintendo',
                'publisher' => 'Nintendo',
                'description' => 'An open-world action-adventure game set in the land of Hyrule.',
                'trailer_url' => 'https://www.youtube.com/watch?v=1rPxiXXxftE',
            ],
            [
                'title' => 'Elden Ring',
                'release_date' => '2022-02-25',
                'developer' => 'FromSoftware',
                'publisher' => 'Bandai Namco Entertainment',
                'description' => 'A fantasy action RPG developed in collaboration with George R. R. Martin.',
                'trailer_url' => 'https://www.youtube.com/watch?v=E3Huy2cdih0',
            ],
            [
                'title' => 'Hades',
                'release_date' => '2020-09-17',
                'developer' => 'Supergiant Games',
                'publisher' => 'Supergiant Games',
                'description' => 'A rogue-like dungeon crawler where you defy the god of the dead.',
                'trailer_url' => 'https://www.youtube.com/watch?v=591V2QwY9JY',
            ],
            [
                'title' => 'God of War Ragnarök',
                'release_date' => '2022-11-09',
                'developer' => 'Santa Monica Studio',
                'publisher' => 'Sony Interactive Entertainment',
                'description' => 'Kratos e Atreus si avventurano nei Nove Regni alla ricerca di risposte, mentre forze del caos si preparano al Ragnarök.',
                'trailer_url' => 'https://www.youtube.com/watch?v=EE-4GvjKcfs',
            ],
            [
                'title' => 'Red Dead Redemption 2',
                'release_date' => '2018-10-26',
                'developer' => 'Rockstar Games',
                'publisher' => 'Rockstar Games',
                'description' => 'Un’epica avventura western open-world che segue le gesta di Arthur Morgan e la banda di Van der Linde.',
                'trailer_url' => 'https://www.youtube.com/watch?v=eaW0tYpxyp0',
            ],
            [
                'title' => 'Hollow Knight',
                'release_date' => '2017-02-24',
                'developer' => 'Team Cherry',
                'publisher' => 'Team Cherry',
                'description' => 'Un metroidvania atmosferico che esplora il regno sotterraneo di Hallownest.',
                'trailer_url' => 'https://www.youtube.com/watch?v=UAO2urG23S4',
            ],
            [
                'title' => 'Cyberpunk 2077',
                'release_date' => '2020-12-10',
                'developer' => 'CD Projekt RED',
                'publisher' => 'CD Projekt',
                'description' => 'Un RPG futuristico ambientato nella vibrante metropoli di Night City.',
                'trailer_url' => 'https://www.youtube.com/watch?v=FknHjl7eQ6o',
            ],
            [
                'title' => 'Stardew Valley',
                'release_date' => '2016-02-26',
                'developer' => 'ConcernedApe',
                'publisher' => 'ConcernedApe',
                'description' => 'Un simulatore di vita rurale dove coltivi, peschi, mini e stringi relazioni.',
                'trailer_url' => 'https://www.youtube.com/watch?v=ot7uXNQskhs',
            ],
            [
                'title' => 'Disco Elysium',
                'release_date' => '2019-10-15',
                'developer' => 'ZA/UM',
                'publisher' => 'ZA/UM',
                'description' => 'Un RPG investigativo con una forte enfasi sulla narrazione e il dialogo.',
                'trailer_url' => 'https://www.youtube.com/watch?v=Ff0a5jlZf5Q',
            ],
            [
                'title' => 'Super Mario Odyssey',
                'release_date' => '2017-10-27',
                'developer' => 'Nintendo',
                'publisher' => 'Nintendo',
                'description' => 'Mario parte per una nuova avventura intorno al mondo con Cappy, il suo nuovo compagno.',
                'trailer_url' => 'https://www.youtube.com/watch?v=5kcdRBHM7kM',
            ]
        ];

        foreach ($games as $game) {
            $newGame = new Game();
            $newGame->title = $game['title'];
            $newGame->release_date = $game['release_date'];
            $newGame->developer = $game['developer'];
            $newGame->publisher = $game['publisher'];
            $newGame->description = $game['description'];
            $newGame->trailer_url = $game['trailer_url'];
            $newGame->slug = Str::slug($game['title']);
            $newGame->save();
        }
    }
}
