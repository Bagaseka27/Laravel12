@extends('layouts.master')
@section('title', 'Aplikasi Laravel')
@section('content')

<br>
<div class="container">
    <h2>Tabel Produk</h2>
    <a href="{{route('produk.create')}}" class="btn btn-success mb-3" > + Tambah Data</a>
    <table class="table table-bordered table striped" id="tabel-produk">
        <thead>
        <tr>
            <th style="width:1%">No.</th>
            <th style="width:5%">Kode Produk</th>
            <th style="width:5%">Nama Produk</th>
            <th style="width:5%">Kategori</th>
            <th style="width:5%">Harga</th>
            <th style="width:5%">Stok</th>
            <th style="width:5%">Aksi</th>
        </tr>
        </thead>
    <tbody>
    @foreach ($dataProduk as $data)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->id }}</td>
        <td>{{ $data->nama_produk }}</td>
        <td>{{ ($data->kategori)->nama_kategori}}</td>
        <td>{{ number_format($data->harga, 0, ',', '.') }}</td>
        <td>{{ $data->stock }}</td>
        <td>
            <form action="{{ route('produk.delete', $data->id) }}" method="post">
                @csrf
                <a href="{{ route('produk.edit', $data->id) }}" class="btn btn-warning">Ubah</a>
                <button class="btn btn-danger">Hapus</button>
            </form>
            {{-- <a href="{{route('produk.edit', $data->id)}}" class="btn btn-warning">Ubah</a> --}}
            {{-- <button class="btn btn-warning">Ubah</button> --}}
            {{-- <button class="btn btn-danger">Hapus</button> --}}
        </td>
    </tr>
    @endforeach
    </tbody>
    </table>
</div>
@endsection
