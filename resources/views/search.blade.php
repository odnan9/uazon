@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
  <h1>Resultados de la búsqueda</h1>


    @if(sizeof($libros))
      <table class="table table-bordered">
      <tr>
      @foreach($libros[0] as $value => $libro)
        <th>{{$value}}</th>
      @endforeach
      </tr>
      @foreach($libros as $key => $libro)
        <tr>
          <td>{{ $libro['libros_id'] }}</td>
          {{--<td>{{ $libro->libros_id }}</td>--}}
          {{--<td>{{ $libro->titulo }}</td>--}}
          {{--<td>{{ $libro->editorial }}</td>--}}
          {{--<td>{{ $libro->isbn }}</td>--}}
        </tr>
      @endforeach
    @else
      <tr>
        <td colspan="3">Result not found.</td>
      </tr>
    @endif
      </table>


    @if(sizeof($autores))
      <table class="table table-bordered">
      <tr>
      @foreach($autores[0] as $value => $autor)
          <th>{{$value}}</th>
        @endforeach
      </tr>
      @foreach($autores as $autor)
        <tr>
          <td>{{ $autor['autores_id'] }}</td>
          {{--<td>{{ $autor->autores_id }}</td>--}}
          {{--<td>{{ $autor->nombre }}</td>--}}
        </tr>
      @endforeach
        </table>
    @endif

  </table>
  </div>
</div>
@endsection
