<?php

use Illuminate\Database\Seeder;

class SickleavesTableSeeder extends Seeder
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
        
                DB::table('sickleaves')->insert([
                'date' => $faker->dateTimeBetween('-6 months', '2 years'),
                'user_id' => $faker->numberBetween(1, 10)
             ]);
         }
    }
    
}
