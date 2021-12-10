@extends('include.menu')

@section('menu')
    <div style="font-size:16px;padding:10px;color:red">
        <b>{{session('status')}}</b>
    </div>
    <div class="moduleHeader" >
        <h2>Naudotojų blokavimas ir šalinimas</h2>
    </div>
    <div style="width: 95%; margin: auto" >
    <form method="post" action="{{route('blockUser')}}">
        <!-- need the csrf tag in every POST method form -->
        @csrf
        <table style="width:100%">
            <tr>
                <td style="width:40%">
                    <label>Naudotojo el. pašto adresas</label>
                </td>
                <td style="width:55%">
                    <div class="input-group">
                        <input type="email" name="email">
            
                        @error('email')
                            <div style="font-size:16px;color:red">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </td>
                <td style="width:5%">
                    <button type="submit" class=" btn btn-secondary createButton"  name="filter_btn">Ieškoti</button>
                </td>
            </tr>
        </table>
    </form>
    <br>
    <table class='table thead-dark table-bordered table-hover'  >
    <thead style="background: #d1d1d1"> <tr>
            <th>El paštas</th>
            <th>Slapyvardis</th>
            <th>Tipas</th>
            <th>Statusas</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users_list as $item)
        <tr>
            <td>{{$item->email}}</td>
            <td>{{$item->username}}</td>
            <td>{{$item->level}}</td>
            <td>{{$item->status}}</td>
            @if ($item->status == "užblokuotas")
            <td>
                <form method="post" action="{{route('blockUser')}}">
                    @csrf
                    <input type="hidden" name="unblock" value="{{$item->id}}">
                    <button type="submit" class="btn" name="block_btn">
                        
                    <img src ="https://maxcdn.icons8.com/Share/icon/Editing//edit1600.png" style = "height: 20px;">
                    Atblokuoti
                </button>
                </form>
            </td>
            @else
            <td >
                <form method="post" action="{{route('blockUser')}}">
                    @csrf
                    <input type="hidden" name="block" value="{{$item->id}}">
                    <button type="submit" class="btn" name="block_btn">
                        <img src ="https://maxcdn.icons8.com/Share/icon/Editing//edit1600.png" style = "height: 20px;">
                   Blokuoti</button>
                </form>
            </td>
            @endif
            <td >
                <form method="post" action="{{route('blockUser')}}">
                    @csrf
                    <input type="hidden" name="delete" value="{{$item->id}}">
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
    <br>
@endsection