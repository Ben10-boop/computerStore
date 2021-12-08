@extends('include.menu')

@section('menu')
    <div style="font-size:16px;padding:10px;color:red">
        <b>{{session('status')}}</b>
    </div>
    <div class="header" style="width:50%">
        <h2>Prekės kategorijos kūrimas</h2>
    </div>
    <form class="content" style="width:50%" method="post" action="{{route('addCategory')}}">
        <!-- need the csrf tag in every POST method form -->
        @csrf
        <div class="input-group">
            <label>Kategorijos pavadinimas:</label>
            <input type="text" name="pavadinimas" value="{{old('pavadinimas')}}">

            @error('pavadinimas')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group">
            <label>Aprašas:</label>
            <input type="text" name="aprasas" value="{{old('aprasas')}}">

            @error('aprasas')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        
        <div class="input-group">
            <button type="submit" class="btn" name="register_btn">Sukurti kategoriją</button>
        </div>
    </form>
    <br>
@endsection