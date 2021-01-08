<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [1 => ['Q3'],
                2 => ['A3'],
                    3 => ['J3'],
        ];
        $insertData = [];

            foreach($data as $key=>$value) {
                foreach($value as $newValue) {
                    $insertData [] = ['name' => $newValue,
                        'brand_id' => $key,
                        ];
                }


        }
        DB::table('models')->insert($insertData);
        //
    }
}
