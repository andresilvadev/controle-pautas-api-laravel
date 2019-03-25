<?php

use Illuminate\Database\Seeder;

class PautasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        factory(App\Pauta::class,10)->create();
    }
}
