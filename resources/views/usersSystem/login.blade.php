<!DOCTYPE html>
<html>
    <head>
        <title>Prisijungimas</title>
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
            <h2>Prisijungimas</h2>
        </div>
        <form method="post" action="{{route('login')}}">
            <!-- need the csrf tag in every POST method form -->
            @csrf
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
            @if (session('status'))
            <div style="font-size:16px;color:red">
                {{session('status')}}
            </div>
            @endif
            <div class="input-group">
                <button type="submit" class="btn" name="register_btn">Prisijungti</button>
                <a href="{{route('register')}}" style="float:right">Sukurti naują paskyrą</a>
            </div>
        </form>
    </body>
</html>