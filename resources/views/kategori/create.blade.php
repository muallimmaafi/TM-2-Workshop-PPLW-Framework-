@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Tambah Kategori</h4>

        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label>Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">
                Simpan
            </button>

            <a href="{{ route('kategori') }}" class="btn btn-secondary">
                Kembali
            </a>
        </form>
    </div>
</div>

@endsection