@extends('template')

@section('title','Admin Page')

@section('content')
    <div class="content-container">
        <div class="admin-header">
            <h1>Students</h1>
            <form action="/insert" method="get">
                <button>Insert new Student</button>
            </form>
        </div>
        <div class="student-data">
            @foreach($data as $all)
                <div class="student-container">
                    <div class="admin-info-container">
                        <span class="student-info">
                            <i class="fas fa-user"></i>
                            {{$all->student_name}}
                        </span>
                        <span class="student-info">
                            <i class="fas fa-envelope"></i>
                            {{$all->email}}
                        </span>
                        <span class="student-info">
                            <i class="fas fa-id-badge"></i>
                            {{$all->nim}}
                        </span>
                    </div>
                    <div class="btn-container">
                        <form action="/update-user/{{$all->id}}" method="get">
                            <button>Update</button>
                        </form>
                        <form action="/delete-user/{{$all->id}}" method="post">
                            {{csrf_field()}}
                            <button>Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
@endsection