@extends('layouts.master')

@section('title','Profil Mahasiswa')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            Profil Mahasiswa
        </div>
        <div class="card-body">
            <p><strong>Nama:</strong>{{$nama}}</p>
            <p><strong>NIM: </strong>{{$nim}}</p>
        </div>
    </div>
</div>
@endsection