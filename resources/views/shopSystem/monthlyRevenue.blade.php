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
            <th>Pavadinimas</th>
            <th>Vnt kaina</th>
            <th>Parduotas kiekis</th>
            <th>Pajamos</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($products_list as $month_group)
    <tr><td colspan="4" style="text-align: center; background: #d5d9e0">Data: {{$month_group[0]->metai}} {{$month_group[0]->menuo}}</td></tr>
        @foreach ($month_group as $item)
        <tr>
            <td>{{$item->prek_pavadinimas}}</td>
            <td>{{$item->vnt_kaina}}</td>
            <td>{{$item->parduotas_kiekis}}</td>
            <td>{{$item->pajamos}}</td>
        </tr>
        @endforeach


    @endforeach
    </tbody>
    </table>
    </div>
    <br>
@endsection