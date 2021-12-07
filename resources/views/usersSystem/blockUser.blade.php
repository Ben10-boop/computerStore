@extends('include.menu')

@section('menu')
    <div style="font-size:16px;padding:10px;color:red">
        <b>{{session('status')}}</b>
    </div>
    <div class="header" style="width:50%">
        <h2>Naudotojų blokavimas ir šalinimas</h2>
    </div>
    <form class="content" style="width:50%" method="post" action="{{route('blockUser')}}">
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
                    <button type="submit" class="btn" name="filter_btn">Ieškoti</button>
                </td>
            </tr>
        </table>
    </form>
    <br>
    <table class="blockTable" style="width:55%">
        <tr>
            <th>El paštas</th>
            <th>Slapyvardis</th>
            <th>Tipas</th>
            <th>Statusas</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($users_list as $item)
        <tr>
            <td>{{$item->email}}</td>
            <td>{{$item->username}}</td>
            <td>{{$item->level}}</td>
            <td>{{$item->status}}</td>
            @if ($item->status == "užblokuotas")
            <td style="text-align:center;background-color:#ae2121">
                <form method="post" action="{{route('blockUser')}}">
                    @csrf
                    <input type="hidden" name="unblock" value="{{$item->id}}">
                    <button type="submit" class="btn" name="block_btn">Atblokuoti</button>
                </form>
            </td>
            @else
            <td style="text-align:center;background-color:#ae2121">
                <form method="post" action="{{route('blockUser')}}">
                    @csrf
                    <input type="hidden" name="block" value="{{$item->id}}">
                    <button type="submit" class="btn" name="block_btn">Blokuoti</button>
                </form>
            </td>
            @endif
            <td style="text-align:center;background-color:#ae2121">
                <form method="post" action="{{route('blockUser')}}">
                    @csrf
                    <input type="hidden" name="delete" value="{{$item->id}}">
                    <button type="submit" class="btn" name="delete_btn">Šalinti</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <br>
@endsection