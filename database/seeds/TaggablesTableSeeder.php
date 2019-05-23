<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TaggablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i <= 30; $i++) {
            DB::table('taggables')->insert([
                'tag_id' => $faker->numberBetween(1, 10),
                'taggable_id' => $faker->numberBetween(1, 40),
                'taggable_type' => $faker->randomElement(['movie', 'post'])
            ]);
        }
    }
}
