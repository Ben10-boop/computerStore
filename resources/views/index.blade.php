@extends('include.menu')

@section('menu')
    <div style="font-size:16px;padding:10px;color:red">
        <b>{{session('status')}}</b>
    </div>

    <form action="{{route('home')}}">
        <input onChange="return {{route('home')}}" name ="filter"></input>
        <button type="submit">Filtruoti prekes</button>
    </form>
    
    <div style="font-size:16px;padding:10px;color:red">
        <b>{{session('status')}}</b>
    </div>
    <div class="header" style="width:50%">
        <h2>Prekių sąrašo peržiūra</h2>
    </div>
    <br>
    <table class="blockTable" style="width:55%">
        <tr>
            <th>Barkodas</th>
            <th>Aprašymas</th>
            <th>Pagaminimo šalis</th>
            <th>Pagaminimo metai</th>
            <th>Kaina</th>
            <th>nuoroda_i_foto</th>
            <th>Kategorijos</th>
        </tr>
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
    </table>
    <br>
@endsection

