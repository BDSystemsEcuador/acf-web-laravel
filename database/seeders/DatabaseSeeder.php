<?php

namespace Database\Seeders;

use Database\Factories\InicioFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
	\App\Models\User::factory(1)->create();
        DB::table('categories')->insert(
            [
                'id' => 1,
                'title' =>'Proyectos'
            ]
        );
    	$this->call(QuienesSomosSeeder::class);
    }
}
