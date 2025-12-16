<nav class="navbar fixed-top" style="background-color: #7633f9">
  <div class="container position-relative">

    <!-- Tombol Back -->
    <a href="{{ route('home') }}" 
       class="position-absolute start-0 ms-2 text-white">
      <i class="bi bi-arrow-left fs-4 text-white p-3"></i>
    </a>

    <!-- Brand di tengah -->
    <div class="navbar-brand mx-auto text-white">
      {{ $title ?? 'Bootstrap' }}
    </div>

  </div>
</nav>
