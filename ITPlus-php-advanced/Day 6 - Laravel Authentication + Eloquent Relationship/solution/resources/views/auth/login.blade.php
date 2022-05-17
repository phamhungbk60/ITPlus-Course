<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}" />
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #17a2b8;
            height: 100vh;
        }
        #login .container #login-row #login-column #login-box {
            margin-top: 120px;
            max-width: 600px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
        }
        #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
        }

    </style>
</head>
<body>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{ url('login') }}" method="POST">
                            @csrf
                            <h3 class="text-center text-info">Login</h3>
                            {{-- Hiển thị thông tin flash ra ngoài --}}
                            @if(Session::has('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('error') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $email }}"/>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" />
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <label for="remember-me" class="text-info">
                                    <span>Remember me</span> 
                                    <span><input id="remember-me" name="remember-me" type="checkbox"></span>
                                </label>
                                <a href="{{ url('register') }}" class="text-info">Register here</a>
                            </div>
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="Login">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
