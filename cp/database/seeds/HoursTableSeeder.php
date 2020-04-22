<?php

use Illuminate\Database\Seeder;

class HoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                
                $faker = Faker\Factory::create();

              
                for ($i = 1; $i <= 50; $i++) {
        
                    DB::table('hours')->insert([
                        'date' => $faker->dateTimeBetween('-6 months', '2 years'),
                        'hours' => $faker->numberBetween(1, 160),
                        'status' => $faker->boolean(50),
                        'user_id' => $faker->numberBetween(1, 10)
                    ]);
                }
    }
}
