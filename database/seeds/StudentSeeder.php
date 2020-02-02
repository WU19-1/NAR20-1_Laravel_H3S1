<?php

use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Student::create([
            'student_name' => 'Testing',
            'email' => 'testing@email.com',
            'password' => bcrypt('asd'),
            'nim' => '1234567892'
        ]);
    }
}
