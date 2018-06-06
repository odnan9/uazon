@extends('layouts.app')

@section('content')
  {{ csrf_field() }}

  @if(Request::get('receiver_email'))

  @endif
  {{----}}
{{--// ES UN PAGO DE PAYPAL--}}
{{--if(isset($_POST["receiver_email"]))--}}
{{--{--}}
  {{--$cliente = $_POST["custom"];--}}
  {{--$idPedido = $_POST["item_number"];--}}

  {{--echo "<br> El pago del pedido :".$idPedido;--}}
  {{--echo "<br> por el cliente con id :".$cliente;--}}
  {{--echo "<br> NO SE HA REALIZADO ";--}}
{{--}--}}
{{--else--}}
{{--{--}}
  {{--echo "<br> Ocurrio un error con el pago";--}}
{{--}--}}
{{--?>--}}
@endsection