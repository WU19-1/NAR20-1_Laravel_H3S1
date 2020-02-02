@extends('template')

@section('title','Profile')

@section('content')
    <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="profile-container">
            <img class="profile-image" src="storage/{{auth()->user()->studentdetail->image}}" onerror="this.onerror=null; this.src='https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/user_male2-512.png'">
            <div class="student-info">
                <h3 class="name">{{auth()->user()->student_name}}</h3>
                <p class="description">My Motto : </p>
                <input type="text" name="desc" class="desc" value="{{auth()->user()->studentdetail->motto}}">
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
    </form>
    <form action="/update_pw_user" method="post">
        {{csrf_field()}}
        <div class="update-pw-container">
            <h2>Update Password</h2>
            <input type="password" name="old_password" class="updatepw" placeholder="Old Password"> <br>
            <input type="password" name="password" class="updatepw" placeholder="New Password"> <br>
            <input type="password" name="password_confirmation" class="updatepw" placeholder="Confirm New Password"> <br>
            <div class="errors-update-container">
            @if(session()->has('errorupdate'))
                <div class="error-update">{{session('errorupdate')}}</div>
            @endif
            </div>
            <div class="errors-update-container">
            @if(session()->has('successupdate'))
                <div class="success-update">{{session('successupdate')}}</div>
            @endif
            </div>
            <button>Update</button>
        </div>
    </form>
@endsection