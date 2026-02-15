<?php

use App\Http\Controllers\ProfileController;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::get('/kategori', function () {
        $data = Kategori::all();
        return view('kategori.index', compact('data'));
    })->name('kategori');

    Route::get('/kategori/create', function () {
        return view('kategori.create');
    })->name('kategori.create');

    Route::post('/kategori', function (\Illuminate\Http\Request $request) {

        \App\Models\Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('kategori');
    })->name('kategori.store');

    Route::get('/buku', function () {
        $data = Buku::with('kategori')->get();
        return view('buku.index', compact('data'));
    })->name('buku');

    Route::get('/buku/create', function () {
        $kategori = \App\Models\Kategori::all();
        return view('buku.create', compact('kategori'));
    })->name('buku.create');

    Route::post('/buku', function (\Illuminate\Http\Request $request) {

        \App\Models\Buku::create([
            'kode' => $request->kode,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'kategori_id' => $request->kategori_id
        ]);

        return redirect()->route('buku');
    })->name('buku.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
