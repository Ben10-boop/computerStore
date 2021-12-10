@extends('include.menu')

@section('menu')
    <div style="font-size:16px;padding:10px;color:red">
        <b>{{session('status')}}</b>
    </div>
    <div class="moduleHeader" >
        <h2>Kategorijos</h2>
    </div>
    <div style="width: 95%; margin: auto" >
    <form method="get" action="{{route('addCategory')}}">
        @csrf
        <button type="submit" class="btn btn-secondary addButton">Nauja kategorija</button>
    </form>
    <br>
    <table class='table thead-dark table-bordered table-hover'  >
    <thead style="background: #d1d1d1">
        <tr>
            <th>ID</th>
            <th>Pavadinimas</th>
            <th>Aprašas</th>
            <th colspan = "2"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories_list as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->pavadinimas}}</td>
            <td>{{$item->aprasas}}</td>
            <td>
                <form method="get" action="{{route('editCategory')}}">
                    @csrf
                    <input type="hidden" name="edit" value="{{$item->id}}">
                    <button type="submit"  class="btn" id="crudButton" name="edit_btn">
                         <img src ="https://maxcdn.icons8.com/Share/icon/Editing//edit1600.png" style = "height: 20px;">
                    </button>
                </form>
            </td>
            <td>
                <form method="post" action="{{route('categories')}}">
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
    </div>
    <br>
@endsection