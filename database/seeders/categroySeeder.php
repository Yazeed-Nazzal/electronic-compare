<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class categroySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('categories')->insert([
            'category_name'=> $faker->sentence(2),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
   