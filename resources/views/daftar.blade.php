@extends('layouts.master')

@section('title','Daftar Mahasiswa')

@section('content')
<div class="container mt-5">
    <h3>Daftar Mahasiswa</h3>
    <table class="table table-bordered table-striped">
        <thead  class="table-dark">
            <tr>
                <th>Nama</th>
                <th>NIM</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswa as $mhs)
            <tr>
                <td>{{$mhs['nama']}}</td>
                <td>{{$mhs['nim']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection