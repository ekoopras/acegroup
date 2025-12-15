@extends('layouts.app')

@section('content')

<nav class="navbar fixed-top" style="background-color: #0066ff">
  <div class="container position-relative">

    <!-- Tombol Back -->
    <a href="{{ route('product-laptop.index') }}" 
       class="position-absolute start-0 ms-2 text-white">
      <i class="bi bi-arrow-left fs-4 text-white p-3"></i>
    </a>

    <!-- Brand di tengah -->
    <div class="navbar-brand mx-auto text-white">
      {{ $title ?? 'Bootstrap' }}
    </div>

  </div>
</nav>

<form action="{{ route('product-laptop.store') }}" method="POST">
@csrf

<section style="padding: 70px 0 100px 0">
    <div class="container">

        <div class="card rounded-0">
            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text"
                           name="barang"
                           class="form-control"
                            placeholder="Masukan Nama Barang"
                           value="{{ old('barang') }}"
                           required>
                </div>

                <div class="mb-3">
                <label class="form-label d-block">Kondisi</label>

                <div class="form-check">
                    <input class="form-check-input"
                        type="radio"
                        name="kondisi"
                        value="Baru"
                        {{ old('kondisi') == 'Baru' ? 'checked' : '' }}>
                    <label class="form-check-label">Baru</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input"
                        type="radio"
                        name="kondisi"
                        value="Bekas"
                        {{ old('kondisi') == 'Bekas' ? 'checked' : '' }}>
                    <label class="form-check-label">Bekas</label>
                </div>
            </div>

                <div class="mb-3">
    <label class="form-label">Harga</label>
    <input type="text"
           name="harga"
           id="harga"
           class="form-control"
           placeholder="Rp."
           value="{{ old('harga') }}"
           required>
</div>


            </div>
        </div>

    </div>
</section>

<!-- Bottom Fixed Button -->
<nav class="bottom-nav fixed-bottom bg-white border-top">
    <div class="container">
        <div class="d-grid gap-2 col-12 mx-auto py-2">
            <button class="btn btn-primary" type="submit">
                Simpan Data
            </button>
        </div>
    </div>
</nav>

</form>

<script>
document.getElementById('harga').addEventListener('input', function (e) {
    let value = this.value.replace(/\D/g, '');
    this.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
});
</script>





@endsection