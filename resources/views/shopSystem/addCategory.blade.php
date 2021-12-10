@extends('include.menu')

@section('menu')
    <div style="font-size:16px;padding:10px;color:red">
        <b>{{session('status')}}</b>
    </div>
    
    <div class="moduleHeader" >
        <h2>Prekės kategorijos kūrimas</h2>
    </div>
    
    <div style="width: 95%; margin: auto" >
    <form class="content" style="width:40%; margin: auto"  method="post" action="{{route('addCategory')}}">
        <!-- need the csrf tag in every POST method form -->
        @csrf
        <div class=" form-group col">
            <label class="control-label" >Kategorijos pavadinimas:</label>
            <input type="text"   class="form-control input-sm" name="pavadinimas" value="{{old('pavadinimas')}}">

            @error('pavadinimas')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
            <label class="control-label" >Aprašas:</label>
            <input type="text" class="form-control input-sm" name="aprasas" value="{{old('aprasas')}}">

            @error('aprasas')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <br>
        
        <div class="input-group">
            <button type="submit"  class=" btn btn-secondary createButton" name="register_btn">Sukurti kategoriją</button>
        </div>
    </form>
    </div>
    <br>
@endsection