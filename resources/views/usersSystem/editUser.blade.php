@extends('include.menu')

@section('menu')
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
        <div class="input-group">
            <button type="submit" class="btn">Patvirtinti pakeitimus</button>
        </div>
    </form>
@endsection