@extends('template')

@section('title','Home')

@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())
        <div class="profile-container">
            <img class="profile-image" src="storage/{{auth()->user()->studentdetail->image}}" onerror="this.onerror=null; this.src='/storage/default.png'">
            <div class="student-info">
                <h1 class="name">{{auth()->user()->student_name}}</h1>
                <p class="desc">My Motto : </p>
                <p class="desc">{{auth()->user()->studentdetail->motto}}</p>
            </div>
        </div>
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
    @elseif(auth('admin')->check())
        <table class="table" border="0" cellspacing="0" cellpadding="0">
            <thead class="dark-header">
            <tr>
                <th scope="col" class="header">No</th>
                <th scope="col" class="header">Last Login</th>
                <th scope="col" class="header">Last Logout</th>
            </tr>
            </thead>
            @foreach($data as $info)
                <tbody>
                    <tr class="info-login">
                        <th scope="col">{{$i++}}</th>
                        <td scope="col">{{$info->last_login}}</td>
                        <td scope="col">{{$info->last_logout}}</td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    @endif



@endsection