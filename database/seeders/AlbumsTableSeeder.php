<?php

namespace Database\Seeders;

use App\Models\Music\Album;
use Illuminate\Database\Seeder;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Album::factory()
            ->times(100)
            ->create();
    }
}
