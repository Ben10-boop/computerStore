@extends('include.menu')

@section('menu')
    <div style="font-size:16px;padding:10px;color:red">
        <b>{{session('status')}}</b>
    </div>
    <div class="header" style="width:50%">
        <h2>Darbuotojo paskyros kūrimas</h2>
    </div>
    <form class="content" style="width:50%" method="post" action="{{route('addWorker')}}">
        <!-- need the csrf tag in every POST method form -->
        @csrf
        <div class="input-group">
            <label>Vartotojo vardas:</label>
            <input type="text" name="username" value="{{old('username')}}">

            @error('username')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group">
            <label>Elektroninio pašto adresas:</label>
            <input type="text" name="email" value="{{old('email')}}">

            @error('email')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group">
            <label>Atlyginimas:</label>
            <input type="text" name="wage" value="{{old('wage')}}">

            @error('wage')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group">
            <label>Įdarbinimo data:</label>
            <input type="date" name="hire_date">

            @error('hire_date')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group">
            <label>Darbo valandos per savaitę:</label>
            <input type="text" name="work_hours" value="{{old('work_hours')}}">

            @error('work_hours')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group">
            <label>Pareigos:</label>
            <input type="text" name="job" value="{{old('job')}}">

            @error('job')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group">
            <label>Slaptažodis:</label>
            <input type="password" name="password">

            @error('password')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group">
            <label>Pakartoti slaptažodį:</label>
            <input type="password" name="password_confirmation">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="register_btn">Sukurti darbuotojo paskyrą</button>
        </div>
    </form>
    <br>
@endsection