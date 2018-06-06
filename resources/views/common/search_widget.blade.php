<!-- Search widget -->
<form class="search__form--flex search__form" method="GET" action="/search">
  <input class="search__input--flex search__input" type="text" name="search" placeholder="Buscar libro por título, autor, ISBN..." value="{{ old('search') }}">
    <button class="search__button--radius" type="submit">
      <i class="fa fa-search"></i>
    </button>
</form>
