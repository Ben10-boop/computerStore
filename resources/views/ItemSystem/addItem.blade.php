@extends('include.menu')

@section('menu')
    <div style="font-size:16px;padding:10px;color:red">
        <b>{{session('status')}}</b>
    </div>
    
    <div class="moduleHeader" >
        <h2>Prekės kūrimas</h2>
    </div>
    
    <div style="width: 95%; margin: auto" >
    <form class="content" style="width:40%; margin: auto"  method="post" action="{{route('addItem')}}">
        <!-- need the csrf tag in every POST method form -->
        @csrf
        <div class=" form-group col">
            <label class="control-label" >Barkodas:</label>
            <input type="text"   class="form-control input-sm" name="barkodas" value="{{old('barkodas')}}">

            @error('barkodas')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
            <label class="control-label" >Prekės pavadinimas:</label>
            <input type="text"   class="form-control input-sm" name="prek_pavadinimas" value="{{old('prek_pavadinimas')}}">

            @error('prek_pavadinimas')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
            <label class="control-label" >Aprašymas:</label>
            <input type="text" class="form-control input-sm" name="aprasymas" value="{{old('aprasymas')}}">

            @error('aprasymas')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
            <label class="control-label" >Kaina:</label>
            <input type="text"   class="form-control input-sm" name="suma" value="{{old('suma')}}">

            @error('suma')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
            <label class="control-label" >Kategorijų sarašas:</label>
            <select class="form-control input-sm" name="kategorijos_id" value="{{old('kategorijos_id')}}">
            <option value="1">Žaidimai</option>
            <option value="2">Kompiuteriai</option>
            <option value="3">Vaikams</option>
            <option value="4">Veiksmo</option>
            </select>
            @error('kategorijos_id')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
            <label class="control-label" >Pagaminimo šalis:</label>
            <input type="text" class="form-control input-sm" name="pagaminimo_salis" value="{{old('pagaminimo_salis')}}">

            @error('pagaminimo_salis')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
            <label class="control-label" >Nuoroda į nuotrauką:</label>
            <input type="text" class="form-control input-sm" name="nuoroda_i_foto" value="{{old('nuoroda_i_foto')}}">

            @error('nuoroda_i_foto')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
            <label class="control-label" >Pagaminimo metai:</label>
            <input type="text" class="form-control input-sm" name="pagaminimo_metai" value="{{old('pagaminimo_metai')}}">

            @error('pagaminimo_metai')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <br>
        
        <div class="input-group">
            <button type="submit"  class=" btn btn-secondary createButton" name="register_btn">Pridėti prekę</button>
        </div>
    </form>
    </div>
    <br>
@endsection