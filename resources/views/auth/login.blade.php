<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>
</head>
<body>
        <div class="bg">
            <div class="form-container">
                <form class="login" action="" method="post">
                    <h1>Login</h1>
                    {{csrf_field()}}
                    <div class="field-container">
                        <div class="field">
                            <label for="">Email</label>
                            <input type="text" name="email" placeholder="Type your email"> <br>
                        </div>
                        <div class="field">
                            <label for="">Password</label>
                            <input type="password" name="password" placeholder="Type your password"> <br>
                        </div>
                        <div>
                            <input type="checkbox" name="remember">
                            <label for="remember">Remember Me</label>
                        </div>
                        <br>
                    </div>
                    <button>Login</button>
                </form>
            </div>
        </div>
</body>
</html>