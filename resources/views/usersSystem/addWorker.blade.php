@extends('include.menu')

@section('menu')
    <div style="font-size:16px;padding:10px;color:red">
        <b>{{session('status')}}</b>
    </div>
    <div class="moduleHeader" >
        <h2>Darbuotojo paskyros kūrimas</h2>
    </div>
    <div style="width: 95%; margin: auto" >
    <form class="content" style="width:40%; margin: auto" method="post" action="{{route('addWorker')}}">
        <!-- need the csrf tag in every POST method form -->
        @csrf
        <div class=" form-group col">
             <label class="control-label" >Vartotojo vardas:</label>
            <input type="text"   class="form-control input-sm"  name="username" value="{{old('username')}}">

            @error('username')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
             <label class="control-label" >Elektroninio pašto adresas:</label>
            <input type="text"   class="form-control input-sm" name="email" value="{{old('email')}}">

            @error('email')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
             <label class="control-label" >Atlyginimas:</label>
            <input type="text"   class="form-control input-sm"   name="wage" value="{{old('wage')}}">

            @error('wage')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
             <label class="control-label" >Įdarbinimo data:</label>
            <input class="form-control input-sm"   type="date" name="hire_date">

            @error('hire_date')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
             <label class="control-label" >Darbo valandos per savaitę:</label>
            <input class="form-control input-sm"   type="text" name="work_hours" value="{{old('work_hours')}}">

            @error('work_hours')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
             <label class="control-label" >Pareigos:</label>
            <input class="form-control input-sm"   type="text" name="job" value="{{old('job')}}">

            @error('job')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
             <label class="control-label" >Slaptažodis:</label>
            <input class="form-control input-sm"   type="password" name="password">

            @error('password')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
             <label class="control-label" >Pakartoti slaptažodį:</label>
            <input class="form-control input-sm"   type="password" name="password_confirmation">
        </div>
        <br>
        <div class="input-group">
            <button type="submit" class=" btn btn-secondary createButton" name="register_btn">Sukurti darbuotojo paskyrą</button>
        </div>
    </form>
    </div>
    <br>
@endsection