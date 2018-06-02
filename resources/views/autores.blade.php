@extends('layouts.app')

@section('content')
  <div class="container__autores">
    <div class="row">
      <div class="col-md-6 offset-3">
        <div class="autores__titulo">
          <div class="">Listado de autores</div>
          <table class="autores__table">
            <tr>
              <th>Nombre del autor</th>
            </tr>
            @foreach ($listaAutores as $autor)
              <tr>
                <td><a href="{{route('autores', [$autor])}}">{{ $autor->nombre }}</a></td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection


