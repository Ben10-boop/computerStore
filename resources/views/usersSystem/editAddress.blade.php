@extends('include.menu')

@section('menu')
    <div style="font-size:16px;padding:10px;color:red">
        <b>{{session('status')}}</b>
    </div>
    <div class="header" style="width:70%">
        <h2>Jūsų adresai</h2>
    </div>
    <div  class="content" style="width:70%">
        <table class="blockTable" style="width:80%">
            <tr>
                <th>Gatvė</th>
                <th>Namo nr.</th>
                <th>Buto nr.</th>
                <th>Rajonas</th>
                <th>Savivaldybė</th>
                <th>Pašto kodas</th>
                <th></th>
            </tr>
            @foreach ($address_list as $item)
            <tr>
                <td>{{$item->gatve}}</td>
                <td>{{$item->namo_numeris}}</td>
                <td>{{$item->buto_numeris}}</td>
                <td>{{$item->rajonas}}</td>
                <td>{{$item->savivaldybe}}</td>
                <td>{{$item->pasto_kodas}}</td>
                <td style="text-align:center;background-color:#ae2121">
                    <form method="post" action="{{route('editAddress')}}">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="delete_adr" value="{{$item->id}}">
                        <button type="submit" class="btn" name="delete_btn">Ištrinti</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="header" style="width:50%">
        <h2>Pridėti adresą</h2>
    </div>
    <form class="content" style="width:50%" method="post" action="{{route('editAddress')}}">
        <!-- need the csrf tag in every POST method form -->
        @csrf
        <div class="input-group">
            <label>Gatvė:</label>
            <input type="text" name="gatve">

            @error('gatve')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group">
            <label>Namo numeris:</label>
            <input type="text" name="namo_numeris">

            @error('namo_numeris')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group">
            <label>Buto numeris:</label>
            <input type="text" name="buto_numeris">

            @error('buto_numeris')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group">
            <label>Rajonas:</label>
            <input type="text" name="rajonas">

            @error('rajonas')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group">
            <label>Savivaldybė:</label>
            <input type="text" name="savivaldybe">

            @error('savivaldybe')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group">
            <label>Pašto kodas:</label>
            <input type="text" name="pasto_kodas">

            @error('pasto_kodas')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <table>
            <tr>
                <td style="width:33%">
                    <div class="input-group">
                        <button type="submit" class="btn">Pridėti adresą</button>
                    </div>
                </td>
                <td style="width:33%">
                    <a href="{{route('editUser')}}" style="float:right">Redaguoti pagrindinius elementus</a>
                </td>
                <td style="width:33%">
                    <a href="{{route('editCredit')}}" style="float:right">Redaguoti banko kortelę</a>
                </td>
            </tr>
        </table>
    </form>
    <br>
@endsection