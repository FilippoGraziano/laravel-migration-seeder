<?php

namespace Database\Seeders;

use Faker\Generator as Faker;

use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void {

        for ($i = 0; $i < 100; $i++) {

            $newTrain = new Train();

            $newTrain->company = $faker->company();
            $newTrain->departure_station = $faker->city();
            $newTrain->arrival_station = $faker->city();
            $newTrain->departure_date = $faker->dateTimeThisYear('+1 year');
            $newTrain->departure_time = $faker->time();
            $newTrain->arrival_time = $faker->time();
            $newTrain->train_code = $faker->bothify('??-####');
            $newTrain->tot_carriages = $faker->randomNumber(1, true);
            $newTrain->in_time = $faker->boolean();
            $newTrain->cancelled = $faker->boolean();

            if ($newTrain->in_time || $newTrain->cancelled) {
                $newTrain->late_time = null;
            } else {
                $newTrain->late_time = $faker->randomNumber(2, false);
            }


            $newTrain->price = $faker->randomFloat(2, 20, 100);

            $newTrain->save();

        };

    }
}
