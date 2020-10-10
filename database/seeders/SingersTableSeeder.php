<?php

namespace Database\Seeders;

use App\Models\Music\Singer;
use Illuminate\Database\Seeder;

class SingersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Singer::factory()
            ->times(40)
            ->create();
    }
}
