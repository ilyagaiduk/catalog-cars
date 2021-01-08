<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        User::create(['name' => 'Admin', 'email' => 'gaydukilya@ya.ru', 'password' => bcrypt('12345678'), 'is_admin' => 1]);
        $this->call(BrandTableSeeder::class);
        $this->call(ModelsSeeder::class);
        $this->call(CarsTableSeeder::class);

    }
}
