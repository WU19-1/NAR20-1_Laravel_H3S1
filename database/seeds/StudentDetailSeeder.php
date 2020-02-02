<?php

use Illuminate\Database\Seeder;

class StudentDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\StudentDetail::create([
            'student_id' => 1,
            'image' => '',
            'motto' => 'I want to join SLC'
        ]);
    }
}
