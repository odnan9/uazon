<!-- Vamos a redirigir la pagina a la pasarela de
   pago de paypal con los valores que nos llegan del formulario -->
<body onLoad="document.formulario.submit()" >
{{--{{$total}}--}}
{{--{{$idPedido}}--}}
{{--{{$cliente}}--}}
{{--{{$opcion}}--}}
{{--<body>--}}
<div>Connect to Paypal...</div>
<form  name="formulario"
       id="formulario"
       action="https://sandbox.paypal.com/cgi-bin/webscr"
       method="post">
  <!-- Identificar tu tienda (recuerda los datos
     puestos en la cuente creada como seller en
     developer.paypal.com) -->
  <input type="hidden"
         name="bn"
         value="UAZONProweb_Buy_WPS_ES">
  <!-- el nombre da igual -->
  <input type="hidden"
         name="business"
         value="estudiosnando9-facilitator@gmail.com">
  <!-- introducir el email de la cuenta de prueba -->
  <!-- Especificar el tipo de boton/formulario en paypal -->
  <input type="hidden"
         name="cmd"
         value="_xclick">
  <input type="hidden"
         name="no_note"
         value="1">
  <!-- Ponemos que no pregunten sobre el envio
     -nuestra web se hace cargo- -->
  <input type="hidden"
         name="no_shipping"
         value="1">
  <!-- El unico item es la compra realizada -nosotros con el id
     de la compra ya sacamos los producto- -->
  <input type="hidden"
         name="item_name"
         value="Compra de libros en UAZON">
  <!-- Especificamos el id del pedido -->
  <input type="hidden"
         name="item_number"
         value="{{$idPedido['pedidos_id']}}">
  <!-- Ponemos el total de la compra -->
  <input type="hidden"
         name="amount"
         value="{{$total}}">
  <!-- Especificamos pago en euro -->
  <input type="hidden"
         name="currency_code"
         value="EUR">
  <input type="hidden"
         name="rm" value="2">
  <!-- Como dato extra, enviamos el codigo del cliente -->
  <input type="hidden"
         name="custom"
         value="{{$cliente}}">
  <!-- Pagina de vuelta de la compra efectuada -->
  <input type="hidden"
         name="return"
         value="http://www.prowebproject.com/compraok">
  <!-- Pagina de vuelta de la compra con error-->
  <input type="hidden"
         name="cancel_return"
         value="http://www.prowebproject.com/compraerror">
</form>
</body>