<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //El orden IMPORTA, se ejecuta en orden. En este caso USER utiliza una clave ajena de Role, por lo tanto cuando USER se ejecute ROLE debe existir.
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ActivitySeeder::class);
    }
}
