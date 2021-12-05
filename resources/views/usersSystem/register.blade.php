<!DOCTYPE html>
<html>
    <head>
        <title>Registracija</title>
        <!-- <link rel="stylesheet" type="text/css" href="../../css/style.css"> -->
        <style>
            body {
                font-size: 120%;
                background: #F8F8FF;
            }
            .header {
                width: 40%;
                margin: 50px auto 0px;
                color: white;
                background: #ae2121;
                text-align: center;
                border: 1px solid #B0C4DE;
                border-bottom: none;
                border-radius: 10px 10px 0px 0px;
                padding: 20px;
            }
            form, .content {
                width: 40%;
                margin: 0px auto;
                padding: 20px;
                border: 1px solid #B0C4DE;
                background: white;
                border-radius: 0px 0px 10px 10px;
            }
            .input-group {
                margin: 10px 0px 10px 0px;
            }
            .input-group label {
                display: block;
                text-align: left;
                margin: 3px;
            }
            .input-group input {
                height: 30px;
                width: 93%;
                padding: 5px 10px;
                font-size: 16px;
                border-radius: 5px;
                border: 1px solid gray;
            }
            .btn {
                padding: 10px;
                font-size: 15px;
                color: white;
                background: #ae2121;
                border: none;
                border-radius: 5px;
            }
            a {
                color: #ae2121;
            }
            a:hover {
                color: black;
            }
        </style>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta name="robots" content="noindex" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="header">
            <h2>Registracija</h2>
        </div>
        <form method="post" action="{{route('register')}}">
            <!-- need the csrf tag in every POST method form -->
            @csrf
            <div class="input-group">
                <label>Vartotojo vardas:</label>
                <input type="text" name="username" value="{{old('username')}}">

                @error('username')
                    <div style="font-size:16px;color:red">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="input-group">
                <label>Elektroninio pašto adresas:</label>
                <input type="text" name="email" value="{{old('email')}}">

                @error('email')
                    <div style="font-size:16px;color:red">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="input-group">
                <label>Slaptažodis:</label>
                <input type="password" name="password">

                @error('password')
                    <div style="font-size:16px;color:red">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="input-group">
                <label>Pakartoti slaptažodį:</label>
                <input type="password" name="password_confirmation">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="register_btn">Registruotis</button>
                <a href="{{route('login')}}" style="float:right">Atgal į prisijungimo langą</a>
            </div>
        </form>
    </body>
</html>