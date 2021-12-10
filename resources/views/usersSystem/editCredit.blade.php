@extends('include.menu')

@section('menu')
    <div style="font-size:16px;padding:10px;color:red">
        <b>{{session('status')}}</b>
    </div>
    <div class="moduleHeader" >
        <h2>Jūsų banko kortelės</h2>
    </div>
    
    <div style="width: 95%; margin: auto" >
        <table class='table thead-dark table-bordered table-hover' >
        <thead style="background: #d1d1d1">
        <tr>
            <th>Savininkas</th>
            <th>Galiojimo pabaiga</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            @foreach ($credit_list as $item)
            <tr>
                <td>{{$item->korteles_savininkas}}</td>
                <td>{{$item->galiojimo_data}}</td>
                <td>
                    <form method="post" action="{{route('editCredit')}}">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="delete_credit" value="{{$item->id}}">
                        <button type="submit" class="btn" name="delete_btn">
                            <img src ="https://cdn0.iconfinder.com/data/icons/round-ui-icons/512/close_red.png" style = "height: 20px;">
                    </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <div class="moduleHeader">
        <h2>Pridėti kortelę</h2>
    </div>
    <form class="content" style="width:40%; margin: auto" method="post" action="{{route('editCredit')}}">
        <!-- need the csrf tag in every POST method form -->
        @csrf
        <div class=" form-group col">
            <label class="control-label" >Numeris:</label>
            <input type="text" class="form-control input-sm" name="numeris">

            @error('numeris')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
            <label class="control-label" >Galiojimo pabaiga:</label>
            <input type="date"  class="form-control input-sm"  name="galiojimo_data">

            @error('galiojimo_data')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
            <label class="control-label" >CVV:</label>
            <input type="text"  class="form-control input-sm"  name="cvv">

            @error('cvv')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
            <label class="control-label" >Kortelės savininkas:</label>
            <input type="text"  class="form-control input-sm"  name="korteles_savininkas">

            @error('korteles_savininkas')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <br>
        <table>
            <tr>
                <td>
                <div class=" input-group ">
                    <button type="submit" style=" width: 100%"  class=" btn btn-secondary createButton" >Pridėti kortelę</button>
                </div>
                </td>
            </tr>
            <tr>
                <td>
                <div class=" input-group">
                <a href="{{route('editUser')}}"  style=" width: 100%"  class=" btn btn-secondary createButton" >Redaguoti pagrindinius elementus</a>
                </div>
            </td>
            </tr>
            <tr>
                <td>
                <div class=" input-group">
                    <a href="{{route('editAddress')}}" style=" width: 100%"  class=" btn btn-secondary createButton" >Redaguoti adresus</a>
                    </div>
                </td>
            </tr>
        </table>
    </form>
    </div>
    <br>
@endsection