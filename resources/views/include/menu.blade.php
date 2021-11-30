<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="container-fluid p-5 bg-primary text-white text-center">
            <h1>This is menu header to be included everywhere</h1>
            <p>Computers and games store</p> 
        </div>
        <div style="text-align: right;padding:10px">
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit">Atsijungti</button>
            </form>
        </div>
        @yield('menu')
    </body>
</html>