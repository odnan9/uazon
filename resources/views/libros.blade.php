@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Listado de libros</div>
                    <table>
                        <tr>
                            <th>Título</th>
                            <th>Editorial</th>
                            <th>Precio</th>
                            <th>ISBN</th>
                            <th>Páginas</th>
                            <th>Votos</th>
                            <th>Número de votos</th>
                        </tr>
                        @foreach ($listadoLibros as $libro)
                            <tr>
                                <td><a href="{{route('libro', [$libro->libros_id])}}">{{ $libro->titulo }}</a></td>
                                <td>{{ $libro->editorial }}</td>
                                <td>{{ $libro->precio }}</td>
                                <td>{{ $libro->isbn }}</td>
                                <td>{{ $libro->n_pags }}</td>
                                <td>{{ $libro->voto }}</td>
                                <td>{{ $libro->num_voto }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


