@extends('template')

@section('title','Insert')

@section('content')
    <div class="insert-container-and-form">
        <div class="insert-container">
            <h1>INSERT NEW STUDENT</h1>
            <form action="/insert" method="post" class="insert-form">
                {{csrf_field()}}
                <input type="text" class="student" name="name" id="name" placeholder="Insert name"> <br>
                <input type="text" class="student" name="email" id="email" placeholder="Insert email"> <br>
                <input type="text" class="student" name="nim" id="nim" placeholder="Insert NIM"> <br>
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
                <button>Insert</button>

            </form>
        </div>
    </div>
    <div class="success">

    </div>
@endsection