@extends('layouts.app')


@section('content')
<a href="{{ route('home') }}" class="btn btn-outline-secondary mb-3">← Kembali</a>


<div class="d-flex justify-content-between align-items-center mb-3">
<h3 class="fw-bold">Kategori</h3>
<a href="{{ route('categories.create') }}" class="btn btn-primary">+ Tambah</a>
</div>


@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif


<div class="card shadow-sm">
<div class="card-body">
<table class="table table-hover align-middle">
<thead class="table-primary">
<tr>
<th>Nama</th>
<th>Slug</th>
</tr>
</thead>
<tbody>
@foreach($categories as $c)
<tr>
<td>{{ $c->name }}</td>
<td>{{ $c->slug }}</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
@endsection