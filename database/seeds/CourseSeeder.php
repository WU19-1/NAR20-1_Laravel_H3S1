<?php

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Course::create([
            'course_name' => 'Algorithm and Programming',
            'course_code' => 'COMP6047'
        ]);
        \App\Course::create([
            'course_name' => 'Data Structures',
            'course_code' => 'COMP6048'
        ]);
        \App\Course::create([
            'course_name' => 'Web Programming',
            'course_code' => 'COMP6144'
        ]);
        \App\Course::create([
            'course_name' => 'Database Systems',
            'course_code' => 'ISYS6169'
        ]);
    }
}
