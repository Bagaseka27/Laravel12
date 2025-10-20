@extends('layouts.master')
@section('title','Daftar Produk')
@section('content')

<div class="container mt-5">
    <h3>Daftar Produk</h3>
    <table class="table table-bordered table-striped">
        <thead  class="table-dark">
            <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Produk as $produk)
            <tr>
                <td>{{$produk['nama']}}</td>
                <td>Rp{{ number_format($produk['harga'], 0, ',', '.') }}</td>
                <td><a href="{{ url('detail-produk/'.$produk['id']) }}" class="btn btn-primary">Detail</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection