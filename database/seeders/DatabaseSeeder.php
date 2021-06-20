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
	// \App\Models\User::factory(1)->create();
        DB::table('categories')->insert(
            [
                'id' => 1,
                'title' =>'Proyectos'
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'Byron Daniel',
                'email' => 'byrondanipm@gmail.com',
                'email_verified_at' => null,
                'password' => bcrypt('123456789') , // password
                'remember_token' => null,
            ]
            );
        DB::table('users')->insert(
            [
                'name' => 'info fundacionalasdecolibri',
                'email' => 'info@fundacionalasdecolibri.org',
                'email_verified_at' => null,
                'password' => bcrypt('123456789') , // password
                'remember_token' => null,
            ]
            );
            DB::table('users')->insert(
                [
                    'name' => 'comunicacion acf',
                    'email' => 'comunicacion.acf@gmail.com',
                    'email_verified_at' => null,
                    'password' => bcrypt('123456789') , // password
                    'remember_token' => null,
                ]
                );
                DB::table('users')->insert(
                    [
                        'name' => 'Maria G',
                        'email' => 'maria.g@fundacionalasdecolibri.org',
                        'email_verified_at' => null,
                        'password' => bcrypt('123456789') , // password
                        'remember_token' => null,
                    ]
                    );

    	$this->call(QuienesSomosSeeder::class);
    }
}
