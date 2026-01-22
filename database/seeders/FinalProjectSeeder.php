<?php

namespace Database\Seeders;

use App\Models\Platform;
use App\Models\Game;
use Illuminate\Database\Seeder;

class FinalProjectSeeder extends Seeder
{
    /**
     * Seed the database with 13 games, then delete 3 to have 10 active and 3 in trash.
     */
    public function run(): void
    {
        // Ensure we have platforms
        $platforms = Platform::all();
        if ($platforms->isEmpty()) {
            $platforms = Platform::factory(5)->create();
        }

        // Create 13 games for final project
        $gameData = [
            ['title' => 'God of War Ragnarök', 'release_year' => 2022, 'developer' => 'Santa Monica Studio', 'publisher' => 'Sony Interactive Entertainment'],
            ['title' => 'Horizon Forbidden West', 'release_year' => 2022, 'developer' => 'Guerrilla Games', 'publisher' => 'Sony Interactive Entertainment'],
            ['title' => 'Spider-Man 2', 'release_year' => 2023, 'developer' => 'Insomniac Games', 'publisher' => 'Sony Interactive Entertainment'],
            ['title' => 'Starfield', 'release_year' => 2023, 'developer' => 'Bethesda Game Studios', 'publisher' => 'Bethesda Softworks'],
            ['title' => 'Resident Evil 4 Remake', 'release_year' => 2023, 'developer' => 'Capcom', 'publisher' => 'Capcom'],
            ['title' => 'Dead Space Remake', 'release_year' => 2023, 'developer' => 'Motive Studio', 'publisher' => 'Electronic Arts'],
            ['title' => 'Hogwarts Legacy', 'release_year' => 2023, 'developer' => 'Avalanche Software', 'publisher' => 'Warner Bros. Games'],
            ['title' => 'Alan Wake 2', 'release_year' => 2023, 'developer' => 'Remedy Entertainment', 'publisher' => 'Epic Games'],
            ['title' => 'Lies of P', 'release_year' => 2023, 'developer' => 'Neowiz Games', 'publisher' => 'Neowiz Games'],
            ['title' => 'Armored Core VI', 'release_year' => 2023, 'developer' => 'FromSoftware', 'publisher' => 'Bandai Namco'],
            // These 3 will be deleted
            ['title' => 'Forspoken', 'release_year' => 2023, 'developer' => 'Luminous Productions', 'publisher' => 'Square Enix'],
            ['title' => 'Redfall', 'release_year' => 2023, 'developer' => 'Arkane Studios', 'publisher' => 'Bethesda Softworks'],
            ['title' => 'The Day Before', 'release_year' => 2023, 'developer' => 'Fntastic', 'publisher' => 'Mytona'],
        ];

        $gamesToDelete = [];

        foreach ($gameData as $index => $data) {
            // Check if game already exists (active or trashed)
            $existingGame = Game::withTrashed()->where('title', $data['title'])->first();
            
            if (!$existingGame) {
                $game = Game::create([
                    'title' => $data['title'],
                    'developer' => $data['developer'],
                    'publisher' => $data['publisher'],
                    'release_year' => $data['release_year'],
                    'platform_id' => $platforms->random()->id,
                    'photo' => null,
                ]);

                // Mark last 3 games for deletion
                if ($index >= 10) {
                    $gamesToDelete[] = $game;
                }
            } elseif ($index >= 10 && !$existingGame->trashed()) {
                // If game exists and is not trashed, add to delete list
                $gamesToDelete[] = $existingGame;
            }
        }

        // Delete the last 3 games (move to trash)
        foreach ($gamesToDelete as $game) {
            if (!$game->trashed()) {
                $game->delete();
                $this->command->info("Moved '{$game->title}' to trash");
            }
        }

        $activeCount = Game::count();
        $trashCount = Game::onlyTrashed()->count();

        $this->command->info("Final Project Seeder completed!");
        $this->command->info("Active games: {$activeCount}");
        $this->command->info("Games in trash: {$trashCount}");
    }
}
