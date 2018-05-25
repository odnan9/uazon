@extends('layouts.app')

@section('content')
  <div class="container_libros container">
    @foreach ($listaPedidos as $key => $libro)
      @if (!($key % 2))
        <div class="libros__row row">
          @endif
          <div class="col-md-2">
            <div class="libros__item">
              <a href="{{route('libro', [$libro->libros_id])}}">
                <img class="libros__img" src="/assets/images/libros/{{$libro->libros_id}}/{{$libro->libros_id}}_x300.jpg">
              </a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="libros__titulo">
              <span><strong><a href="{{route('libro', [$libro->libros_id])}}">{{$libro->titulo}}</a></strong></span>
            </div>

            <div class="libros__autor">
              <a href="{{ route('autores', [\App\Database\libros::find($libro->libros_id)->autores()->pluck('autores_id')[0]]) }}"> {{ \App\Database\libros::find($libro->libros_id)->autores()->pluck('nombre')[0] }} </a>
            </div>
            <div class="libros__editorial">
            <span>
              {{ $libro->editorial }}
            </span>
            </div>
            <form method="POST" action="{{url('cart')}}">
              <input type="hidden" name="libros_id" value="{{$libro->libros_id}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="lomas__btn">
                <i class="fa fa-shopping-cart" style="color: #990073"></i>
                <strong>
                  {{$libro->precio}} €
                </strong>
              </button>
            </form>
            <div class="libros__masinfo">
              <a href="{{route('libro', [$libro->libros_id])}}">(más informacion...)</a>
            </div>
          </div>
          @if (($key % 2))
        </div>
        <hr style="height: 0.1%">
      @endif
    @endforeach
  </div>
@endsection
