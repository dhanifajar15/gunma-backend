<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\User;

class DBSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  $this->call(UserSeeder::class);
        Image::factory()->count(100)->create();
        User::factory()->count(100)->create();

    }
}
