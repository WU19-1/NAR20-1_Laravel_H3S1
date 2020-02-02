<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$ecode}}</title>
</head>
<body>
    <div class="error-container">
        <div class="errorcode">
            {{$ecode}}
        </div>
        <div class="errormsg">
            {{$msg}}
        </div>
        <a href="/login">Go to Login Page</a>
    </div>
</body>
<style>
    *{
        box-sizing: border-box;
        margin: 0;
    }
    .error-container{
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        height: 100vh;
        background-image: url("../images/bg.jpg");
        background-repeat: no-repeat;
        background-opacity: 0.5;
    }
    .errorcode{
        font-size: 120px;
    }
    .errormsg{
        font-size: 30px;
        margin: 5px;
        padding: 5px;
    }
    a{
        text-decoration: none;
        color: white;
        background-color: #09a133;
        padding: 15px;
        border-radius: 8px;
        transition: 0.3s;
        cursor: pointer;
        color: whitesmoke;
    }
    a:hover{
        background-color: #29c284;
    }
</style>
</html>