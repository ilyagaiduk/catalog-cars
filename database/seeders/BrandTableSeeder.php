<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Audi',
            'Range Rover',
            'BMW',
        ];
        $insertData = [];
        for ($i = 0; $i<=2; $i++) {
            $insertData [] = [
                'name' => $data [$i]
                    ];

        }
        DB::table('brand')->insert($insertData);
    }
}
