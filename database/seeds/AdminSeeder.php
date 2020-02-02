<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin::create([
            'email' => 'admin@email.com',
            'password' => bcrypt('asd'),
        ]);
    }
}
