@extends('layouts.app')

@section('content')

<a href="{{ route('home') }}" class="btn btn-outline-secondary mb-3">
    ← Kembali
</a>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-bold">Daftar Produk</h3>
    <a href="{{ route('products.create') }}" class="btn btn-primary">
        + Tambah Produk
    </a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow-sm">
    <div class="card-body">

        <table class="table table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th>Name</th>
                    <th>Barang</th>
                    <th>Harga (Rp)</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $p)
                <tr>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->barang }}</td>
                    <td>{{ number_format($p->harga, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('products.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('products.destroy', $p->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>

@endsection
