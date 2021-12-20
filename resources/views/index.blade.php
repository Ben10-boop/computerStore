@extends('include.menu')

@section('menu')
    <div style="font-size:16px;padding:10px;color:red">
        <b>{{session('status')}}</b>
    </div>

    <div class="moduleHeader" >
        <h2>Prekių sąrašo peržiūra</h2>
    </div>

    
    <div style="width: 95%; margin: auto" >
    <form class="form-inline my-2 my-lg-0" action="{{route('home')}}"  >
        <input class="inline" type="search" placeholder="Ieškoti..." aria-label="Ieškoti..." name ="filter">
        <button class="btn btn-outline-success inline" type="submit">Filtruoti prekes</button>
    </form>
    <br>
        
    <div class="row row-cols-1 row-cols-md-4">
        @foreach ($products_list as $item)
  <div class="col mb-4">
    <div class="card">
      <form  method="post" action="{{route('previewItem')}}">
        @csrf
        <input type="hidden" name="id" value="{{$item->id}}">
        <button type="submit" class="btn" name="preview_btn">
            <img src="{{$item->nuoroda_i_foto}}" class="card-img-top" style="height: 350px; widht: 100px; object-fit: cover;" >
      </from>
      <div class="card-body">
        <h5 class="card-title">{{$item->prek_pavadinimas}}</h5>
        <p class="card-text">Kaina: {{$item->suma}} eur.</p>
        <p class="card-text">Priklauso kategorijoms: {{$item->kategoriju_sarasas}}</p>
      </div>
    </div>
  </div>
        @endforeach
</div>
    </div>
    <br>
@endsection

