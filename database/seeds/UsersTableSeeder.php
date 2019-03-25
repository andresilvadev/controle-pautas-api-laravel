<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'André Luiz da Silva',
            'email' => 'andreluiz1013@hotmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Eliane Vieira da Rosa',
            'email' => 'eliane@hotmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        factory(App\User::class,9)->create();
    }
}
