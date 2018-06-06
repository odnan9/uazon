@extends('layouts.app')

@section('content')
  {{ csrf_field() }}

  <div class="panel panel-default">
    <div class="panel-body">A Basic Panel</div>
  </div>

@endsection