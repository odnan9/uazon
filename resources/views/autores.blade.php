@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Listado de libros</div>
          <table>
            <tr>
              <th>Nombre del autor</th>
            </tr>
            @foreach ($listaAutores as $autor)
              <tr>
                <td><a href="{{route('autor', [$autor])}}">{{ $autor->nombre }}</a></td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection


