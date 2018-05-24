@extends('layouts.app')

@section('content')
  <div class="container_libros container">
    @foreach ($listaLibros as $libro)
      <div class="libros__row row">
        <div class="col-md-2">
          <div class="libros__item">
            <img class="libros__img" src="assets/images/libros/{{$libro['libros_id']}}/{{$libro['libros_id']}}_x300.jpg">
          </div>
        </div>
        <div class="col-md-6">
          <div class="libros__titulo">
            <span><strong>{{$libro['titulo']}}</strong></span>
          </div>

          <div class="libros__autor">
            <a href="{{ route('autores', [\App\Database\libros::find($libro['libros_id'])->autores()->pluck('autores_id')[0]]) }}"> {{ \App\Database\libros::find($libro['libros_id'])->autores()->pluck('nombre')[0] }} </a>
          </div>
          <div>
            {{ $libro->editorial }}
          </div>
          <div class="libros__masinfo">
            <a href="{{route('libro', [$libro->libros_id])}}">más informacion...</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection
