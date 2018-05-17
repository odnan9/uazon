<!-- Search widget -->
<div class="col-md-4" style="text-align: right">
  <form method="GET" action="/search">
      <input type="text" name="search" class="form-control" placeholder="Buscar libro por título, auto, ISBN..." value="{{ old('search') }}">
    <button type="submit">
      <i class="fa fa-search"></i>
    </button>
  </form>
</div>