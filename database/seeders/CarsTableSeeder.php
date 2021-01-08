<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $audi = [1 => 'Q3'];
       $RangeRover = [2 => 'A3'];
       $BMW = [3 => 'J3'];
       $data = [$audi,
           $RangeRover,
           $BMW
       ];
       $transmission = [
           1 => 'robot',
           2 => 'automat',
           3 => 'mechanic',
       ];
           $brand = [
               1 => 'audi',
               2 => 'Range Rover',
               3 => 'BMW',
               ];
           $price = [
               1 => 20000,
               2 => 30000,
               3 => 10000,
           ];
           foreach($data as $value){
               $year = mt_rand(1999, 2021);
               $number = mt_rand(100, 999);
               $color = mt_rand(100, 666);
               foreach($value as $key=>$newValue) {
                   $insertData [] = [
                       'brand' => $brand [$key],
                       'model' => $newValue,
                       'photo' => "/uploads/".$key.".jpg",
                       'year' => $year,
                       'number' => $number,
                       'color' => "#".$color,
                       'transmission' => $transmission [$key],
                       'price' => $price [$key],
                       'model_id' => $key,
                       'brand_id' => $key,
                   ];
               }
           }
        DB::table('cars')->insert($insertData);
    }
}
