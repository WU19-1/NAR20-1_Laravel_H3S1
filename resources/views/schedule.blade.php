@extends('template')

@section('title','Class Schedule')

@section('content')
    <div class="schedule-container">
        <div class="today-schedule">

            <table class="table-user" border="0" cellspacing="0" cellpadding="0">
                <thead class="dark-header">
                <tr>
                    <th class="header">Course Status</th>
                    <th class="header">Course Name</th>
                    <th class="header">Date</th>
                    <th class="header">Time</th>
                    <th class="header">Class</th>
                </tr>
                </thead>
                @foreach($x as $info)
                    <tbody>
                    <tr class="info-login">
                        <th scope="col">{{$info->status}}</th>
                        <td scope="col">{{$info->course_name}}</td>
                        <td scope="col">{{$info->date}}</td>
                        <td scope="col">{{$info->start_time}} - {{$info->end_time}}</td>
                        <td scope="col">{{$info->class}}</td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection