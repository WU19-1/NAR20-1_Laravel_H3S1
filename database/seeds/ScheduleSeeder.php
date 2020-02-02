<?php

use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Schedule::create([
            'student_id' => 2,
            'course_id' => 2,
            'start_time' => '07:20',
            'end_time' => '11:00',
            'room' => '722',
            'status' => 'Meeting',
            'date' => \Carbon\Carbon::now()->toDateString(),
            'class' => 'LB01',
        ]);
        \App\Schedule::create([
            'student_id' => 2,
            'course_id' => 22,
            'start_time' => '15:20',
            'end_time' => '17:00',
            'room' => '400',
            'status' => 'GSLC',
            'date' => \Carbon\Carbon::now()->toDateString(),
            'class' => 'LB01',
        ]);
        \App\Schedule::create([
            'student_id' => 2,
            'course_id' => 12,
            'start_time' => '11:20',
            'end_time' => '15:00',
            'room' => '630',
            'status' => 'Meeting',
            'date' => \Carbon\Carbon::now()->toDateString(),
            'class' => 'LB01',
        ]);
        \App\Schedule::create([
            'student_id' => 2,
            'course_id' => 32,
            'start_time' => '07:20',
            'end_time' => '09:00',
            'room' => '428',
            'status' => 'Meeting',
            'date' => \Carbon\Carbon::now()->toDateString(),
            'class' => 'LA01',
        ]);
        \App\Schedule::create([
            'student_id' => 2,
            'course_id' => 42,
            'start_time' => '17:20',
            'end_time' => '19:00',
            'room' => '529',
            'status' => 'GSLC',
            'date' => \Carbon\Carbon::now()->addDay()->toDateString(),
            'class' => 'LF01',
        ]);
    }
}
