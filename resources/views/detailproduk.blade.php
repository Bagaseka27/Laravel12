@extends('layouts.master')
@section('title','Detail Produk')
@section('content')

<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="card" style="width: 22rem;">
    <div class="card-body">
      <h5 class="card-title">Detail Produk</h5>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Nama Produk : {{$produk['nama']}}</li>
      <li class="list-group-item">Harga : Rp{{ number_format($produk['harga'], 0, ',', '.') }}</li>
      <li class="list-group-item">Deskripsi: {{$produk['desk']}}</li>
    </ul>
    <div class="card-body">
      <a href="{{ url('/daftar-produk') }}" class="card-link">Kembali</a>
    </div>
  </div>
</div>
@endsection