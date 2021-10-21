<?php
namespace Database\Seeders;

use App\Models\Image;
use App\Models\Internship;
use App\Models\Location;
use App\Models\Tag;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  $this->call(UserSeeder::class);
        Location::factory()->count(25)->create();
        Tag::factory()->count(25)->create();
        User::factory()->count(25)->create();
        Internship::factory()->count(25)->create();

    }
}
