<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Platform;
use App\Models\Game;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }

        $platforms = Platform::factory(5)->create();

        $gameData = [
            ['title' => 'The Legend of Zelda: Breath of the Wild', 'release_year' => 2017, 'developer' => 'Nintendo EPD', 'publisher' => 'Nintendo'],
            ['title' => 'Elden Ring', 'release_year' => 2022, 'developer' => 'FromSoftware', 'publisher' => 'Bandai Namco'],
            ['title' => 'The Witcher 3', 'release_year' => 2015, 'developer' => 'CD Projekt Red', 'publisher' => 'CD Projekt'],
            ['title' => 'Cyberpunk 2077', 'release_year' => 2020, 'developer' => 'CD Projekt Red', 'publisher' => 'CD Projekt'],
            ['title' => 'Final Fantasy VII Remake', 'release_year' => 2020, 'developer' => 'Square Enix', 'publisher' => 'Square Enix'],
            ['title' => 'Hades', 'release_year' => 2020, 'developer' => 'Supergiant Games', 'publisher' => 'Supergiant Games'],
            ['title' => 'Hollow Knight', 'release_year' => 2017, 'developer' => 'Team Cherry', 'publisher' => 'Team Cherry'],
            ['title' => 'Stardew Valley', 'release_year' => 2016, 'developer' => 'ConcernedApe', 'publisher' => 'ConcernedApe'],
            ['title' => 'Minecraft', 'release_year' => 2011, 'developer' => 'Mojang', 'publisher' => 'Microsoft'],
            ['title' => 'Fortnite', 'release_year' => 2018, 'developer' => 'Epic Games', 'publisher' => 'Epic Games'],
            ['title' => 'Baldurs Gate 3', 'release_year' => 2023, 'developer' => 'Larian Studios', 'publisher' => 'Larian Studios'],
            ['title' => 'Palworld', 'release_year' => 2024, 'developer' => 'Pocket Pair', 'publisher' => 'Pocket Pair'],
        ];

        foreach ($gameData as $data) {
            if (!Game::where('title', $data['title'])->withTrashed()->exists()) {
                Game::create([
                    ...$data,
                    'platform_id' => $platforms->random()->id,
                    'photo' => null,
                ]);
            }
        }

        $trashGameData = [
            ['title' => 'No Mans Sky', 'release_year' => 2016, 'developer' => 'Hello Games', 'publisher' => 'Hello Games'],
            ['title' => 'Anthem', 'release_year' => 2019, 'developer' => 'BioWare', 'publisher' => 'EA'],
            ['title' => 'Fallout 76', 'release_year' => 2018, 'developer' => 'Bethesda', 'publisher' => 'Bethesda'],
            ['title' => 'Concord', 'release_year' => 2024, 'developer' => 'Firewalk Studios', 'publisher' => 'PlayStation'],
        ];

        foreach ($trashGameData as $data) {
            if (!Game::withTrashed()->where('title', $data['title'])->exists()) {
                $game = Game::create([
                    ...$data,
                    'platform_id' => $platforms->random()->id,
                    'photo' => null,
                ]);
                $game->delete();
            }
        }
    }
}
