<?php

use Illuminate\Database\Seeder;
use App\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        User::create([
            'name' => 'thiago', 
            'email' => 'thi.kah.tanaka@gmail.com', 'password' => bcrypt('asdfasdf'),
            'api_token' => Str::random(80),
            ]);
    }
}
