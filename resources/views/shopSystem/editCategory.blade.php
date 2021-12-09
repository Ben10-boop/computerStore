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
        <h2>Kategorijos redagavimas (Pagrindiniai elementai)</h2>
    </div>
    <form class="content" style="width:50%" method="post" action="{{route('editCategory')}}">
        <!-- need the csrf tag in every POST method form -->
        @csrf
        <input type="hidden" name="id" value="{{$editableCategory->id}}">

        <div class="input-group">
            <label>Pavadinimas:</label>
            <input type="text" name="pavadinimas" value="{{$editableCategory->pavadinimas}}">

            @error('pavadinimas')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group">
            <label>Aprašas:</label>
            <input type="text" name="aprasas" value="{{$editableCategory->aprasas}}">

            @error('aprasas')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input-group">
            <button type="submit" class="btn">Patvirtinti pakeitimus</button>
        </div>
    </form>
    <br>
@endsection