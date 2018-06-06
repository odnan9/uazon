@extends('layouts.app')

@section('content')
  {{ csrf_field() }}
  <div class="sitemap__bgimg">
    <div class="sitemap__middle">
      <h2>¡Enhorabuena!</h2>
      <hr>
      <p>Tu pedido ha sido registrado y pronto empezaremos a procesarlo.</p>
    </div>
  </div>
@endsection