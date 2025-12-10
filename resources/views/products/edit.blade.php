@extends('layouts.app')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-warning text-dark">
        <h5 class="m-0">Edit Produk</h5>
    </div>

    <div class="card-body">

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Barang</label>
                <input type="text" name="barang" value="{{ $product->barang }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" name="harga" value="{{ $product->harga }}" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection
