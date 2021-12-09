@extends('include.menu')

@section('menu')
    <div style="font-size:16px;padding:10px;color:red">
        <b>{{session('status')}}</b>
    </div>
    <div class="header" style="width:50%">
        <h2>Kategorijos</h2>
    </div>

    <form method="get" action="{{route('addCategory')}}">
        @csrf
        <button type="submit" class="btn">Nauja kategorija</button>
    </form>
    <br>
    <table class="blockTable" style="width:55%">
        <tr>
            <th>ID</th>
            <th>Pavadinimas</th>
            <th>Aprašas</th>
            <th colspan = "2"></th>
        </tr>
        @foreach ($categories_list as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->pavadinimas}}</td>
            <td>{{$item->aprasas}}</td>
            <td style="text-align:center;background-color:#ae2121">
                <form method="get" action="{{route('editCategory')}}">
                    @csrf
                    <input type="hidden" name="edit" value="{{$item->id}}">
                    <button type="submit" class="btn" name="edit_btn">Redaguoti</button>
                </form>
            </td>
            <td style="text-align:center;background-color:#ae2121">
                <form method="post" action="{{route('categories')}}">
                    @csrf
                    <input type="hidden" name="delete" value="{{$item->id}}">
                    <button type="submit" class="btn" name="delete_btn">Šalinti</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <br>
@endsection