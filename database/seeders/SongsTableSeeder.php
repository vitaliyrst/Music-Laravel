<?php

namespace Database\Seeders;

use App\Models\Music\Song;
use Illuminate\Database\Seeder;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Song::factory()
            ->times(1200)
            ->create();
    }
}
