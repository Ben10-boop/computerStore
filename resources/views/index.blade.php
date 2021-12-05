@extends('include.menu')

@section('menu')
    <div style="font-size:16px;padding:10px;color:red">
        <b>{{session('status')}}</b>
    </div>
    <b>This is the home page, imagine a list of items you can buy or something</b>
@endsection