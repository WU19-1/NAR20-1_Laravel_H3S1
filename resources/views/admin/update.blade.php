@extends('template')

@section('title','Update')

@section('content')
    <form action="/updates" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="profile-container">
            <img class="profile-image" src="../storage/{{$data->studentdetail->image}}" onerror="this.onerror=null; this.src='https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/user_male2-512.png'">
            <div class="student-info">
                <input type="hidden" name="id" value="{{$data->id}}" class="desc">
                <label for="">Name</label>
                <input type="text" name="name" value="{{$data->student_name}}" class="desc">
                <label for="">Motto</label>
                <input type="text" name="motto" value="{{$data->studentdetail->motto}}" class="desc">
                <label for="">NIM</label>
                <input type="text" name="nim" value="{{$data->nim}}" class="desc">
            </div>
        </div>
        <div class="image-uploader">
            <span class="desc">Upload image</span>
            <input type="file" name="images">
        </div>
        <div class="errors">
            @if($errors->any())
                <div class="error-text">{{$errors->first()}}</div>
            @endif
        </div>
        <div class="success">
            @if(isset($success))
                <div class="success-text">{{$success}}</div>
            @endif
        </div>
        <button class="update-btn">Update</button>
{{--        <div class="image-uploader">--}}
        <form action="/resetpw" method="post">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$data->id}}">
            <button class="update-btn">Reset User's Password</button>
        </form>
{{--        </div>--}}
    </form>
@endsection