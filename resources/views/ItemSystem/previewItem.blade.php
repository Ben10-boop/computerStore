@extends('include.menu')

@section('menu')
    <div style="font-size:16px;padding:10px;color:red">
        <b>{{session('status')}}</b>
    </div>
    
    <div class="moduleHeader" >
        <h2>Prekės informacija</h2>
    </div>
    <div style="width: 95%; margin: auto" >   
    <br> 
    <table class='table thead-dark table-bordered table-hover'  >
    <thead style="background: #d1d1d1">
        <tr >
            <th>Barkodas</th>
            <th>Pavadinimas</th>
            <th>Pagaminimo šalis</th>
            <th>Pagaminimo metai</th>
            <th>Aprasymas</th>
            <th>Redaguoti</th>
            <th>Naikinti</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($list as $item)
        <tr>
            <td>{{$item->barkodas}}</td>
            <td>{{$item->prek_pavadinimas}}</td>
            <td>{{$item->pagaminimo_salis}}</td>
            <td>{{$item->pagaminimo_metai}}</td>
            <td>{{$item->aprasymas}}</td>
            <td>
                <form method="get" action="{{route('editItem')}}">
                    @csrf
                    <input type="hidden" name="edit" value="{{$item->id}}">
                    <button type="submit"  class="btn" id="crudButton" name="edit_btn">
                        <img src ="https://maxcdn.icons8.com/Share/icon/Editing//edit1600.png" style = "height: 20px;">
                    </button>
                </form>
            </td>
            <td>
                <form method="post" action="{{route('deleteItem')}}">
                    @csrf
                    <input type="hidden" name="delete" value="{{$item->id}}">
                    <button type="submit"  class="btn" id="crudButton" name="delete_btn">
                        <img src ="https://cdn0.iconfinder.com/data/icons/round-ui-icons/512/close_red.png" style = "height: 20px;">
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    <br>
    </div>
    <br>
@endsection