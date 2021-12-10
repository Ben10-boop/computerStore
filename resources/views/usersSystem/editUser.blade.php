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
    <div class="moduleHeader" >
        <h2>Paskyros redagavimas (Pagrindiniai elementai)</h2>
    </div>
    
    <div style="width: 95%; margin: auto" >
    <form class="content" style="width:40%; margin: auto"  method="post" action="{{route('editUser')}}">
        <!-- need the csrf tag in every POST method form -->
        @csrf
        <div class=" form-group col">
            <label class="control-label" >Vartotojo vardas:</label>
            <input type="text"  class="form-control input-sm"  name="username" value="{{auth()->user()->username}}">

            @error('username')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
            <label class="control-label" >Tikrasis vardas:</label>
            <input type="text"  class="form-control input-sm"  name="name" value="{{auth()->user()->name}}">

            @error('name')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
            <label class="control-label" >Pavardė:</label>
            <input type="text"  class="form-control input-sm"  name="last_name" value="{{auth()->user()->last_name}}">

            @error('last_name')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
            <label class="control-label" >Telefonas:</label>
            <input type="tel"  class="form-control input-sm"  name="phone" value="{{auth()->user()->phone}}">

            @error('phone')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
            <label class="control-label" >Miestas:</label>
            <input type="text"  class="form-control input-sm"  name="city" value="{{auth()->user()->city}}">

            @error('city')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
            <label class="control-label" >Gimimo data:</label>
            <input type="date" class="form-control input-sm"  name="birth_date" >
            ; dabartinė:  <b>{{session('bd')}}</b>

            @error('birth_date')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
            <label class="control-label" >Lytis:</label>
            <select name="gender"  class="form-control input-sm" >
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
                <td >
                    <div class="input-group"  >
                        <button type="submit"  style=" width: 100%" class=" btn btn-secondary createButton">Patvirtinti pakeitimus</button>
                    </div>
                </td>
            </tr>
            <tr>
                <td >
                    <div class="input-group">
                    <a href="{{route('editAddress')}}"   style=" width: 100%" class=" btn btn-secondary createButton">Redaguoti adresus</a>
                    </div>
                </td> 
            </tr>
            <tr>
                <td >
                    <div class="input-group">
                    <a href="{{route('editCredit')}}"   style=" width: 100%" class=" btn btn-secondary createButton">Redaguoti banko kortelę</a>
                    </div>
                 </td>
            </tr>
            </tr>
        </table>
    </form>
    </div>
    <br>
@endsection