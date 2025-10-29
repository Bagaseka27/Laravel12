@extends('layouts.master')
@section('title', 'Aplikasi Laravel')
@section('content')

<br>
<div class="container">
    <h2>Tabel Kategori</h2>
    <a href="{{route('kategori.create)}}" class="btn btn-success">+New Data</a>
    <table class ="table table-bordered table striped" id ="tabel-kategori">
        <thead>
            <tr>
                <th style="width:1%">No.</th>
                <th style="width:5%">Kode Kategori</th>
                <th style="width:%5">Nama Kategori</th>
                <th style="width:5%">Aksi</th>

        </thead>
        <tbody>
            @foreach($dataKategori as $data)
            <tr>
                <td>{{$loop->iteration }}</td>
                <td>{{ $data->id }}</td>
                <td>{{ $data->nama_kategori }}</td>
                <td>
                    <a href="{{ route('kategori.edit', $kat->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('kategori.delete', $kat->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>