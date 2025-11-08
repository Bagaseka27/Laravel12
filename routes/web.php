<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PraktikumController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('lat',function(){
    return view('latihan');
});

Route::get('bio',function(){
    return view('Biodata');
});

Route::get('produk',function(){
    return view('produk');
});

Route::get('nama',function(){
    return view('nama',['name'=> 'Bagas Eka Saputra']);
});

Route::get('nilai1',function(){
    return view('getnilai1');
});

Route::get('nilai2',function(){
    return view('getnilai2');
});

Route::get('/profil', function(){
    $nama = "Budi Santoso";
    $nim = "MI2023001";
    return view('profil',compact('nama','nim'));
});

Route::get('/daftar-mhs',function(){
    $mahasiswa = [
        ["nama"=>"Andi","nim"=>"MI2023002"],
        ["nama"=>"Siti","nim"=>"MI2023003"],
        ["nama"=>"Joko","nim"=>"MI2023004"]
    ];
    return view ('daftar',compact('mahasiswa'));
});

Route::get('/daftar-produk', function(){
    $Produk = [
        ["id"=>"1","nama"=>"Laptop Asus","harga"=>"7500000"],
        ["id"=>"2","nama"=>"Keyboard Mechanical","harga"=>"500000"],
        ["id"=>"3","nama"=>"Mouse Logitech","harga"=>"250000"]
    ];
    return view('daftarproduk', ['Produk' => $Produk]);
});

Route::get('detail-produk/{id}', function($id){
    $Produk = [
        ["id"=>"1","nama"=>"Laptop Asus","harga"=>"7500000","desk"=>"Laptop dengan prosesor i5 dan RAM 8GB"],
        ["id"=>"2","nama"=>"Keyboard Mechanical","harga"=>"500000","desk"=>"Keyboard dengan Backlight RGB"],
        ["id"=>"3","nama"=>"Mouse Logitech","harga"=>"250000","desk"=>"Mouse wireless fast charging"]
    ];
    $produk = collect($Produk)->firstWhere('id', $id);
    if (!$produk) abort(404);
    return view('detailproduk', compact('produk'));
});

/*Route::get('home',[PraktikumController::class, 'home']);
Route::get('produk',[PraktikumController::class, 'product']);
Route::get('transaksi',[PraktikumController::class, 'transaction']);
Route::get('laporan',[PraktikumController::class, 'report']);



Route::controller(ProdukController::class)->group(function(){
    Route::get('tampil-produk', 'index');
    Route::get('tambah-produk', 'create')->name('produk.create');
    Route::post('tampil-produk', 'store')->name('produk.store');
    Route::get('/produk/edit/{id}', 'edit')->name('produk.edit');
    Route::post('/produk/edit/{id}', 'update')->name('produk.update');
    Route::post('/produk/delete/{id}', 'destroy')->name('produk.delete');
});

Route::controller(KategoriController::class)->group(function(){
    Route::get('tampil-kategori', 'index');
    Route::get('tambah-kategori', 'create')->name('kategori.create');
    Route::post('tampil-kategori', 'store')->name('kategori.store');
    Route::get('/kategori/edit/{id}', 'edit')->name('kategori.edit');
    Route::post('/kategori/edit/{id}', 'update')->name('kategori.update');
    Route::post('/kategori/delete/{id}', 'destroy')->name('kategori.delete');
    Route::get('/produk/export/excel',[ProdukController::class, 'excel'])->name('produk.excel');
    Route::get('/produk/export/pdf',[ProdukController::class, 'pdf'])->name('produk.pdf');
    Route::get('/produk/chart', [ProdukController::class, 'chart'])->name('chart');
});
*/

Route::get('home', function () {
    return view('home');
})->middleware('auth'); 

// ---


Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/tampil-produk', [ProdukController::class, 'index']);
    Route::get('/tambah-produk', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/tampil-produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::post('/produk/edit/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::post('/produk/delete/{id}', [ProdukController::class, 'destroy'])->name('produk.delete');

    // --- Routing Kategori ---
    Route::get('/tampil-kategori', [KategoriController::class, 'index']);
    Route::get('/tambah-kategori', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/tampil-kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::post('/kategori/edit/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::post('/kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('kategori.delete');
});

// ---


Route::get('/laporan', [LaporanController::class, 'index'])->middleware(['auth', 'role:admin,kasir']);

