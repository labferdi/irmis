<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PhotoAlbum;
use App\Models\Photo;

use App\Models\VideoAlbum;
use App\Models\Video;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        PhotoAlbum::factory(10)
        ->has(
            Photo::factory()->count(3)
            )
            ->create();

        VideoAlbum::factory(5)
        ->has(
            Video::factory()->count(3)
        )
        ->create();
    }
}
