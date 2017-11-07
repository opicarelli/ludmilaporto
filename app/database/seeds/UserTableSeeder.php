<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert(
            array(
                'name' => 'Marcos Oto Picarelli Prado',
                'email' => 'opicarelli@gmail.com',
                'password' => Hash::make('test'),
                'active' => true,
                'birthdate' => '1987-08-14',
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'username' => 'admin',
                'confirmed' => true,
                'created_at' => date_create()
            )
        );
    }

}