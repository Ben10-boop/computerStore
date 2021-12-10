@extends('include.menu')

@section('menu')
    <div style="font-size:16px;padding:10px;color:red">
        <b>{{session('status')}}</b>
    </div>
    <div class="moduleHeader" >
        <h2>Mėnesinės pelno ataskaitos peržiūra</h2>
    </div>
    <div style="width: 95%; margin: auto" >
    <br>
    <table class='table thead-dark table-bordered table-hover'  >
    <thead style="background: #d1d1d1">
        <tr >
            <th>Barkodas</th>
            <th>Aprašymas</th>
            <th>Pagaminimo šalis</th>
            <th>Pagaminimo metai</th>
            <th>Vnt kaina</th>
            <th>Parduotas kiekis</th>
            <th>Pajamos</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products_list as $item)
        <tr>
            <td>{{$item->barkodas}}</td>
            <td>{{$item->aprasymas}}</td>
            <td>{{$item->pagaminimo_salis}}</td>
            <td>{{$item->pagaminimo_metai}}</td>
            <td>{{$item->vnt_kaina}}</td>
            <td>{{$item->parduotas_kiekis}}</td>
            <td>{{$item->pajamos}}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
    </div>
    <br>
@endsection