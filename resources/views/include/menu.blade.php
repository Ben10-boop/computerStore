<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            body {
                font-size: 120%;
                background: #F8F8FF;
            }
            .header {
                width: 95%;
                margin: 50px auto 0px;
                color: white;
                background: #ae2121;
                text-align: center;
                border: 1px solid #B0C4DE;
                border-bottom: none;
                border-radius: 10px 10px 0px 0px;
                padding: 20px 20px 5px 20px;
            }
            .content {
                width: 95%;
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
            td {
                padding: 5px;
            }
            .blockTable {
                margin: 0px auto;
                border: 4px solid #ae2121;
                border-radius: 5px;
            }
            .blockTable th {
                color: white;
                background-color: #ae2121;
            }
            .blockTable td {
                border: 4px solid #ae2121;
                background-color: white;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <h1>Kompiuterių ir žaidimų parduotuvė</h1>
            <p style="text-align:left;font-size:80%;padding-top:15px">Prisijungęs naudotojas: <b>{{auth()->user()->username}}</b>; tipas: <b>{{auth()->user()->level}}</b></p>
        </div>
        <div class="content">
            <table>
                <tr>
                    <td><a href="{{route('home')}}">Namų puslapis</a></td>
                    <td><a href="{{route('editUser')}}">Redaguoti paskyrą</a></td>
                    @if (auth()->user()->level == "administratorius")
                        <td><a href="{{route('addWorker')}}">Sukurti darbuotojo paskyrą</a></td>
                    @endif
                    @if (auth()->user()->level == "administratorius")
                        <td><a href="{{route('blockUser')}}">Naudotojų sąrašas</a></td>
                    @endif
                    <!-- other operations -->
                    <td style="float:right">
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button class="btn" type="submit">Atsijungti</button>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
        @yield('menu')
    </body>
</html>