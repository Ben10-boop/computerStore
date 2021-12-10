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
        <h2>Kategorijos redagavimas</h2>
    </div>

    <div style="width: 95%; margin: auto" >
    @foreach ($editableCategory as $item)
    <form class="content" style="width:40%; margin: auto" method="post"  action="{{route('editCategory')}}">
        <!-- need the csrf tag in every POST method form -->
        @csrf
        <input type="hidden" name="id" value="{{$item->id}}">

        <div class=" form-group col">
        <label class="control-label" >Pavadinimas:</label>
            <input type="text" class="form-control input-sm"  name="pavadinimas" value="{{$item->pavadinimas}}"></input>

            @error('pavadinimas')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
        <label class="control-label" >Aprašas:</label>
            <input type="text"  class="form-control input-sm"  name="aprasas" value="{{$item->aprasas}}">

            @error('aprasas')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <br>
        <div class="input-group">
            <button type="submit" style=" width: 100%"  class=" btn btn-secondary createButton">Patvirtinti pakeitimus</button>
        </div>
    </form>
    @endforeach
    </div>
    <br>
@endsection