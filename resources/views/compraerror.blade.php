@extends('layouts.app')

@section('content')
  {{ csrf_field() }}
  <div class="sitemap__bgimg">
    <div class="sitemap__middle">
      <h2>¡Lo sentimos!</h2>
      <hr>
      <p>Algo ha ido mal durante el proceso de compra. Intentalo otra vez.</p>
    </div>
  </div>
@endsection