<?php

namespace Database\Seeders;
use Database\Factories\product2Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Faker\Factory;
class PostProduct1sSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        for ($i=0;$i<101;$i++){
            $factory = new product2Factory();
            for ($i = 0; $i < 10; $i++) {
                $data = $factory->definition();
                DB::table('product1s')->insert($data); 
            }

            // DB::table('product1s')->insert(
            // [
            //     'name'=>$faker->name,
            //     'price'=>$faker->numberBetween(100, 1000),
            //     'image'=>$faker->imageUrl($width = 640, $height = 480),
            //     'cate_id'=>1
            // ]
            // );
        }
    }
}
