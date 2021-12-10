@extends('include.menu')

@section('menu')
    <div style="font-size:16px;padding:10px;color:red">
        <b>{{session('status')}}</b>
    </div>
    <div class="moduleHeader" >
        <h2>Jūsų adresai</h2>
    </div>
    <div style="width: 95%; margin: auto" >
    <table class='table thead-dark table-bordered table-hover' >
    <thead style="background: #d1d1d1">
        <tr>
                <th>Gatvė</th>
                <th>Namo nr.</th>
                <th>Buto nr.</th>
                <th>Rajonas</th>
                <th>Savivaldybė</th>
                <th>Pašto kodas</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($address_list as $item)
            <tr>
                <td>{{$item->gatve}}</td>
                <td>{{$item->namo_numeris}}</td>
                <td>{{$item->buto_numeris}}</td>
                <td>{{$item->rajonas}}</td>
                <td>{{$item->savivaldybe}}</td>
                <td>{{$item->pasto_kodas}}</td>
                <td style="text-align:center;background-color:#ae2121">
                    <form method="post" action="{{route('editAddress')}}">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="delete_adr" value="{{$item->id}}">
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
        <h2>Pridėti adresą</h2>
    </div>
    <form class="content" style="width:40%; margin: auto" method="post" action="{{route('editAddress')}}">
        <!-- need the csrf tag in every POST method form -->
        @csrf
        <div class=" form-group col">
            <label class="control-label" >Gatvė:</label>
            <input  class="form-control input-sm" type="text" name="gatve">

            @error('gatve')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
            <label class="control-label" >Namo numeris:</label>
            <input class="form-control input-sm" type="text" name="namo_numeris">

            @error('namo_numeris')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
            <label class="control-label" >Buto numeris:</label>
            <input class="form-control input-sm" type="text" name="buto_numeris">

            @error('buto_numeris')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
            <label class="control-label" >Rajonas:</label>
            <input class="form-control input-sm" type="text" name="rajonas">

            @error('rajonas')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
            <label class="control-label" >Savivaldybė:</label>
            <input class="form-control input-sm" type="text" name="savivaldybe">

            @error('savivaldybe')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class=" form-group col">
            <label class="control-label" >Pašto kodas:</label>
            <input class="form-control input-sm" type="text" name="pasto_kodas">

            @error('pasto_kodas')
                <div style="font-size:16px;color:red">
                    {{$message}}
                </div>
            @enderror
        </div>
        <table>
            <tr>
                <td>
                <div class=" input-group ">
                        <button type="submit" style=" width: 100%"  class=" btn btn-secondary createButton">Pridėti adresą</button>
                </div>
                </td>
            </tr>
            <tr>
                <td>
                <div class=" input-group ">
                    <a href="{{route('editUser')}}" style=" width: 100%" class=" btn btn-secondary createButton">Redaguoti pagrindinius elementus</a>
                </div>
                </td>
            </tr>
            <tr>
            </div>
                <td>
                <div class=" input-group ">
                    <a href="{{route('editCredit')}}" style=" width: 100%" class=" btn btn-secondary createButton">Redaguoti banko kortelę</a>
                </div>
                </td>
            </tr>
           
            </tr>
        </table>
    </form>
    <br>
@endsection