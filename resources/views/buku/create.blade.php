@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Tambah Buku</h4>

        <form action="{{ route('buku.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label>Kode Buku</label>
                <input type="text" name="kode" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Pengarang</label>
                <input type="text" name="pengarang" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Kategori</label>
                <select name="kategori_id" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategori as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">
                Simpan
            </button>

            <a href="{{ route('buku') }}" class="btn btn-secondary">
                Kembali
            </a>

        </form>
    </div>
</div>

@endsection