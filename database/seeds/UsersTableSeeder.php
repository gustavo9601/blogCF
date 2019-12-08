<?php

use Illuminate\Database\Seeder;
use \App\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        //Usando el factory creado para users le pasamos el modelo, le especificamos la cantidad y los cremoas
        factory(App\User::class)->times(100)->create();
        /*
         * Sin usar factory ni faker
        User::create([
            "name" => 'Luis',
            "email" => 'asda@asdasda.com',
            "password" => "asdasd"
        ]);*/

    }
}
