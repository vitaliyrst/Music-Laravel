<?php

namespace Database\Seeders;

use App\Models\Music\Group;
use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::factory()
            ->times(10)
            ->create();
    }
}
