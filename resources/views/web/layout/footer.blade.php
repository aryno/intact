<footer class="bd-footer py-4 py-md-5 mt-5 bg-body-tertiary">
  <div class="container py-4 py-md-5 px-4 px-md-3 text-body-secondary">
    <div class="row">
      <div class="col-lg-3 mb-3">
        <a class="d-inline-flex align-items-center mb-2 text-body-emphasis text-decoration-none text-reset" href="/" aria-label="Bootstrap">
          <img src="{{ asset('images/logo.png') }}" width="60" height="60">
          <span class="fs-5 ms-2 fw-bold">{{ config('app.name') }}</span>
        </a>
        <ul class="list-unstyled small">
          <li class="mb-2">Designed and built by team <strong>ZoomSquad</strong> @vertafore</li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 offset-lg-1 mb-3">
        <h5>Links</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a class="text-decoration-none text-reset" href="/">Home</a></li>
          <li class="mb-2"><a class="text-decoration-none text-reset" href="#">Docs</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 mb-3">
        <h5>Know More</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a class="text-decoration-none text-reset" href="/docs/5.3/getting-started/">Contact Us</a></li>
          <li class="mb-2"><a class="text-decoration-none text-reset" href="{{ route('about') }}">About</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 mb-3">
        <h5>Status</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a class="text-decoration-none text-reset" href="https://github.com/twbs/bootstrap" target="_blank" rel="noopener">System Status</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 mb-3">
        <h5>Community</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a class="text-decoration-none text-reset" href="https://github.com/twbs/bootstrap/issues" target="_blank" rel="noopener">Learn More</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>