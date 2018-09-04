<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,100) as $index) {
            $date = date_create($faker->date);
            $format = date_format($date, "Y-m-d");
            $formatted = strtotime($format);
            DB::table('passports')->insert([
                'name'=>$faker->name,
                'email'=>$faker->unique()->email,
                'number'=>$faker->e164PhoneNumber,
                'office'=>$faker->randomElement($array = array ('Mumbai','Delhi','Bangalore', 'Chennai')),
                'date'=>$formatted,
            ]);
        }
    }
}
