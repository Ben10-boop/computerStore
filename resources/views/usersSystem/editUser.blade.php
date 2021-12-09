@extends('include.menu')

@section('menu')
    @if (auth()->user()->level == "darbuotojas")
        <table style="margin:0px auto">
            <tr>
                <td>
                    <ul>
                        <li>Atlyginimas: <b>{{auth()->user()->wage}}</b></li>
                        <li>Įdarbinimo data:<b>{{auth()->user()->hire_date}}</b></li>
                        <li>Darbo valandos per savaitę:<b>{{auth()->user()->work_hours}}</b></li>
                        <li>Pareigos:<b>{{auth()->user()->job}}</b></li>
                    </ul>
                </td>
            </tr>
        </table>
    @endif
    <div class="header" style="width:50%">
        <h2>Paskyros redagavimas (Pagrindiniai elementai)</h2>
    </div>
    <form class="content" style="width:50%" method="post" action="{{route('editUser')}}">
        <!-- need the csrf tag in every POST method form -->
        @csrf
        <div class="input-group">
            <label>Vartotojo vardas:</label>
            <input type="text" name="username" value="{{auth()->user()->username}}">

            @error('username')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group">
            <label>Tikrasis vardas:</label>
            <input type="text" name="name" value="{{auth()->user()->name}}">

            @error('name')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group">
            <label>Pavardė:</label>
            <input type="text" name="last_name" value="{{auth()->user()->last_name}}">

            @error('last_name')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group">
            <label>Telefonas:</label>
            <input type="tel" name="phone" value="{{auth()->user()->phone}}">

            @error('phone')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group">
            <label>Miestas:</label>
            <input type="text" name="city" value="{{auth()->user()->city}}">

            @error('city')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group">
            <label>Gimimo data:</label>
            <input type="date" name="birth_date" style="width:25%">
            ; dabartinė:  <b>{{session('bd')}}</b>

            @error('birth_date')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group">
            <label>Lytis:</label>
            <select name="gender">
                <option>Vyras</option>
                <option>Moteris</option>
                <option>Kita</option>
            </select>
            ; dabartinė:  <b>{{auth()->user()->gender}}</b>

            @error('gender')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <table>
            <tr>
                <td style="width:33%">
                    <div class="input-group">
                        <button type="submit" class="btn">Patvirtinti pakeitimus</button>
                    </div>
                </td>
                <td style="width:33%">
                    <a href="{{route('editAddress')}}" style="float:right">Redaguoti adresus</a>
                </td>
                <td style="width:33%">
                    <a href="{{route('editAddress')}}" style="float:right">Redaguoti banko kortelę</a>
                </td>
            </tr>
        </table>
    </form>
    <br>
@endsection