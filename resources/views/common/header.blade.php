<!-- Main header -->
<div class="header container-fluid">
  <div class="row main-header">
    <!-- Logo -->
    <div class="logo col-md-2 offset-1">
      <a href="{{ route('home') }}">
        <img class="logo__img--height" align="right" src="/assets/images/logo300x.png">
      </a>
    </div>
    <!-- Search Widget -->
    <div class="search col-md-4">
      @include('common.search_widget')
    </div>
    <div class="user col-md-1">
      @include('common.user')
    </div>
    <div class="shoppingcart col-md-1">
      @include('common.shopping_cart')
    </div>
  </div>
  <div class="row">
    <div class="navigation col-md-12">
      <!-- Navigation -->
      @include('common.navigation')
    </div>
  </div>
</div>
