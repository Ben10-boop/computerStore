@extends('include.menu')

@section('menu')
    <div style="font-size:16px;padding:10px;color:red">
        <b>{{session('status')}}</b>
    </div>
    <div class="header" style="width:50%">
        <h2>Kategorijos</h2>
    </div>
    <br>
    <table class="blockTable" style="width:55%">
        <tr>
            <th>ID</th>
            <th>Pavadinimas</th>
            <th>Aprašas</th>
        </tr>
        @foreach ($categories_list as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->pavadinimas}}</td>
            <td>{{$item->aprasas}}</td>
        </tr>
        @endforeach
    </table>
    <br>
@endsection