@extends('layouts.app')

@section('content')
  <div class="container__main container">
    <div class="home__slider row">
      @include('common.carousel')
    </div>
    <div class="novedades__title row">
      <h2>Novedades</h2>
    </div>
    <div class="home__novedades row">
        @include('home.novedades',['novedades' => $listaNovedades, 'autores' => $listaAutores])
    </div>
    <div class="novedades__title row">
      <h2>Lo más vendido</h2>
    </div>
    <div class="home__lomas row">
      @include('home.lomas',['lomaslibros' => $listaPedidos, 'autores' => $listaAutores])
    </div>
  </div>
@endsection
