<!-- Main header
     ------------------------------------------------------------------------------ -->
<header>

    <!-- Logo -->
    <div>
        <a href="{{ url()->route('home') }}">ProwebUazon</a>
    </div>

    <!-- Header tools -->
    <ul>
        <li><a href="login">Login</a></li>
        <li><a href="register">Registrarse</a></li>
        <li><a href="shopping-cart">Carrito de la compra</a></li>
    </ul>

    <!-- Navigation -->
    @include('common.navigation')

<!-- Search Widget -->
    @include('common.search_widget')

</header>