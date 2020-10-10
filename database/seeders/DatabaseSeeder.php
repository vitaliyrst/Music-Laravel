<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(AlbumsTableSeeder::class);
        $this->call(SingersTableSeeder::class);
        $this->call(SongsTableSeeder::class);
    }
}
