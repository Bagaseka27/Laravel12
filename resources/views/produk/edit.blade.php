@extends('layouts.master')
@section('title', 'Aplikasi Laravel')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4>Edit Data Data</h4>
            
            <br>
            
            <form action="{{route('produk.update',$data->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kode">Kode Produk <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="id" id="id">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Produk <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="nama_produk" id="nama_produk">
                </div>
                <div class="form-group">
                    <label for="harga">Harga <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="harga" id="harga">
                </div>
                <div class="form-group">
                    <label for="stok">Stok <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="stock" id="stock">
                </div>
                
                <br>
                
                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="{{url('tampil-produk')}}" class="btn btn-success">Kembali</a>
            </form>
        </div>
    </div>
</div>

@endsection