<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            body {
                font-size: 100%;
                background: #F8F8FF;
            }
            .header {
                width: 100%;
                color: white;
                background: #ae2121;
                text-align: center;
                padding: 20px 20px 5px 20px;
            }
            
            .moduleHeader{
                width: 95%;
                text-align: center;
                padding: 20px 20px 5px 20px;
            }
            .navbar{
                font-size: 110%;
            }
            .container-fluid{
                width: 95%;
            }
            .addButton{
                background: grey;
            }
            .navbar{
                text-align: center;
                margin: auto;
                background: #d1d1d1;
                font-size: 105%;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 2px 5px 0 rgba(0, 0, 0, 0.19);
            }
            .nav-link{
                color: black;
            }
            .nav-link:hover{
                color: grey;
            }
            .logOutBtn{
                float: right;
                margin-top: 10px;
            }
            
            .createButton{
                float: right;
            }
            
        </style>
    </head>
    <body>
        <div class="header">
            <h1>Kompiuterių ir žaidimų parduotuvė</h1>
            <p>Prisijungęs naudotojas: <b>{{auth()->user()->username}}</b>; tipas: <b>{{auth()->user()->level}}</b></p>
        </div>
    
        <nav class="navbar navbar-expand">
            <div class="container-fluid">
            <ul class="nav navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">Namų puslapis</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('editUser')}}">Redaguoti paskyrą</a>
            </li>
            
            @if (auth()->user()->level == "administratorius")
            <li class="nav-item ">
                <a class="nav-link" href="{{route('addWorker')}}">Sukurti darbuotojo paskyrą</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('blockUser')}}">Naudotojų sąrašas</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('monthlyRevenue')}}">Mėnesinė pelno ataskaita</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('categories')}}">Kategorijos</a>
            </li>
            @endif
        </ul>
        </div>
        </nav>

        <div style="width: 95%; margin: auto" >
        <form class="  logOutBtn"   action="{{route('logout')}}" method="post">
            <button class="btn btn-outline-success " type="submit">Atsijungti</button>
        </form>
        </div>
        <br>
        @yield('menu')
    </body>
</html>
