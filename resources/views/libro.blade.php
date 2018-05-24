@extends('layouts.app')

@section('content')
  <div class="container_libro container">
    <div class="row">
        <div class="col-md-12 libro__header--height">
          <div class="libro__item">
            <img class="libro__img" src="/assets/images/libros/{{$libro['libros_id']}}/{{$libro['libros_id']}}_x400.jpg">
          </div>
          <div class="libro__titulo">
            <span>{{$libro['titulo']}}</span>
          </div>
          <div class="libro__autor">
            <span>{{$autor}}</span>
          </div>
        </div>
      </div>
    <div class="row">
      <div class="col-md-12 libro__subheader--height">
        <div class="libro__editorial">
          <p>Editorial: {{$libro['editorial']}}</p>
          <p>ISBN: {{$libro['isbn']}}</p>
          <p>Páginas: {{$libro['n_pags']}}</p>
        </div>
      </div>
    </div>
    <section class="libro__sinopsis">
      {!! $libro['sinopsis'] !!}
    </section>
  </div>
@endsection
