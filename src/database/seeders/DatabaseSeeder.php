<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(ShopSeeder::class);
    }
}
