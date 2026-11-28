<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newTrain = new Train();

        $newTrain->company = 'Trenitalia';
        $newTrain->departure_station = 'Roma Termini';
        $newTrain->arrival_station = 'Napoli Centrale';
        $newTrain->departure_date = '2026/12/2';
        $newTrain->departure_time = '16:00:00';
        $newTrain->arrival_time = '17:10:00';
        $newTrain->train_code = 'FR 9412';
        $newTrain->tot_carriages = 8;
        $newTrain->in_time = true;
        $newTrain->late_time = null;
        $newTrain->cancelled = false;
        $newTrain->price = 30.00;

        $newTrain->save();
    }
}
