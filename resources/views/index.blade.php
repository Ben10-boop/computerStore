@extends('include.menu')

@section('menu')
    <div style="font-size:16px;padding:10px;color:red">
        <b>{{session('status')}}</b>
    </div>

    <div class="moduleHeader" >
        <h2>Prekių sąrašo peržiūra</h2>
    </div>

    
    <div style="width: 95%; margin: auto" >
    <form class="form-inline my-2 my-lg-0" action="{{route('home')}}"  >
        <input class="inline" type="search" placeholder="Ieškoti..." aria-label="Ieškoti..." name ="filter">
        <button class="btn btn-outline-success inline" type="submit">Filtruoti prekes</button>
    </form>
    <br>
    <table class='table thead-dark table-bordered table-hover'  >
    <thead style="background: #d1d1d1">    <tr>
            <th>Barkodas</th>
            <th>Aprašymas</th>
            <th>Pagaminimo šalis</th>
            <th>Pagaminimo metai</th>
            <th>Kaina</th>
            <th>nuoroda_i_foto</th>
            <th>Kategorijos</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products_list as $item)
        <tr>
            <td>{{$item->barkodas}}</td>
            <td>{{$item->aprasymas}}</td>
            <td>{{$item->pagaminimo_salis}}</td>
            <td>{{$item->pagaminimo_metai}}</td>
            <td>{{$item->suma}}</td>
            <td>{{$item->nuoroda_i_foto}}</td>
            <td>{{$item->kategoriju_sarasas}}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
    </div>
    <br>
@endsection

