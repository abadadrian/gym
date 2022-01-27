<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id'=> '1',
            'name' => 'registrado',
            'email' => 'registrado@gym.com',
            'dni' => '12345678A',
            'weight' => '80',
            'height' =>'180',
            'birthdate' => '1995-10-10 00:00:00',
            'gender' =>'Hombre',
            'password' => bcrypt('password'),
            'role_id' => 1
        ]);

        User::create([
            'id'=> '2',
            'name' => 'usuario',
            'email' => 'usuario@gym.com',
            'dni' => '12345671A',
            'weight' => '50',
            'height' =>'150',
            'birthdate' => '1996-10-10 00:00:00',
            'gender' =>'Hombre',
            'password' => bcrypt('password'),
            'role_id' => 2
        ]);

        User::create([
            'id'=> '3',
            'name' => 'admin',
            'email' => 'admin@gym.com',
            'dni' => '12345672A',
            'weight' => '60',
            'height' =>'150',
            'birthdate' => '1986-10-10 00:00:00',
            'gender' =>'Mujer',
            'password' => bcrypt('password'),
            'role_id' => 3
        ]);

        
    }
}
