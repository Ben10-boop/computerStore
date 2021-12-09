@extends('include.menu')

@section('menu')
    <div style="font-size:16px;padding:10px;color:red">
        <b>{{session('status')}}</b>
    </div>
    <div class="header" style="width:70%">
        <h2>Jūsų banko kortelės</h2>
    </div>
    <div  class="content" style="width:70%">
        <table class="blockTable" style="width:80%">
            <tr>
                <th>Savininkas</th>
                <th>Galiojimo pabaiga</th>
                <th></th>
            </tr>
            @foreach ($credit_list as $item)
            <tr>
                <td>{{$item->korteles_savininkas}}</td>
                <td>{{$item->galiojimo_data}}</td>
                <td style="text-align:center;background-color:#ae2121">
                    <form method="post" action="{{route('editCredit')}}">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="delete_credit" value="{{$item->id}}">
                        <button type="submit" class="btn" name="delete_btn">Ištrinti</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="header" style="width:50%">
        <h2>Pridėti kortelę</h2>
    </div>
    <form class="content" style="width:50%" method="post" action="{{route('editCredit')}}">
        <!-- need the csrf tag in every POST method form -->
        @csrf
        <div class="input-group">
            <label>Numeris:</label>
            <input type="text" name="numeris">

            @error('numeris')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group">
            <label>Galiojimo pabaiga:</label>
            <input type="date" name="galiojimo_data">

            @error('galiojimo_data')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group">
            <label style="width:80%">CVV:</label>
            <input type="text" name="cvv">

            @error('cvv')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group">
            <label>Kortelės savininkas:</label>
            <input type="text" name="korteles_savininkas">

            @error('korteles_savininkas')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <table>
            <tr>
                <td style="width:33%">
                    <div class="input-group">
                        <button type="submit" class="btn">Pridėti kortelę</button>
                    </div>
                </td>
                <td style="width:33%">
                    <a href="{{route('editUser')}}" style="float:right">Redaguoti pagrindinius elementus</a>
                </td>
                <td style="width:33%">
                    <a href="{{route('editAddress')}}" style="float:right">Redaguoti adresus</a>
                </td>
            </tr>
        </table>
    </form>
    <br>
@endsection