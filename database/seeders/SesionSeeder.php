<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sesion;
use DB;

class SesionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sesion::create([
            'id' => 1,
            'diasSesion' => 'Lunes',
            'mesSesion' => '2009-02-15 10:00:00',
            'horaInicio' => '2009-02-15 10:00:00',
            'horaFinal' => '2009-02-15 11:00:00',
            'activity_id' => 1
        ]);

        Sesion::create([
            'id' => 2,
            'diasSesion' => 'Lunes',
            'mesSesion' => '2009-02-15 09:00:00',
            'horaInicio' => '2009-02-15 09:00:00',
            'horaFinal' => '2009-02-15 12:00:00',
            'activity_id' => 2
        ]);

        Sesion::create([
            'id' => 3,
            'diasSesion' => 'Martes',
            'mesSesion' => '2009-02-15 17:00:00',
            'horaInicio' => '2009-02-15 17:00:00',
            'horaFinal' => '2009-02-15 18:30:00',
            'activity_id' => 3
        ]);
    }
}
