<!-- Main footer -->
<div class="footer container-fluid">
  <div class="row main-footer">
    <div class="footer-links__item col-md-1 offset-3">
      <a class="footer-links__link" href="{{ route('privacidad') }}">Privacidad</a>
    </div>
    <div class="footer-links__item col-md-1">
      <a class="footer-links__link" href="{{ route('avisolegal') }}">Aviso legal</a>
    </div>
    <div class="footer-links__item col-md-1">
      <i class="fa fa-envelope"></i>
      <a class="footer-links__link" href="{{ route('contacto') }}">Contacto</a>
    </div>
    <div class="footer-links__item col-md-1">
      <i class="fa fa-sitemap"></i>
      <a class="footer-links__link" href="{{ route('sitemap') }}">
        Sitemap
      </a>
    </div>
    <div class="footer-links__item col-md-1">
      <i class="fa fa-rss"></i>
      <a class="footer-links__link" href="{{ route('rss') }}">RSS</a>
    </div>
  </div>
  <div class="row text-align--right">
    <div class="col-md-12">
      <p class="copyright">@copyright</p>
    </div>
  </div>
</div>