<!-- Main header -->
<div class="header container-fluid">
  <div class="row main-header">
    <!-- Logo -->
    <div class="zlogo col-md-2 offset-2">
      <a href="{{ route('home') }}">
        <img class="logo__img--height" align="right" src="/assets/images/logo500x.png">
      </a>
    </div>
    <!-- Search Widget -->
    <div class="search col-md-3">
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
