<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;
use DB;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activity::create([
            'id' => 1,
            'name' => 'Crossfit',
            'description' => 'Entreno intenso',
            'activity_minutes' => '60',
            'max_participants' => '12',
        ]);
        Activity::create([
            'id' => 2,
            'name' => 'Padel',
            'description' => 'Tecnica mejorada',
            'activity_minutes' => '120',
            'max_participants' => '4',
        ]);
        Activity::create([
            'id' => 3,
            'name' => 'Balonmano',
            'description' => 'Entreno en equipo',
            'activity_minutes' => '60',
            'max_participants' => '25',
        ]);
    }
}
