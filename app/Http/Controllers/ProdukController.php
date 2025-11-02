<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Exports\ProdukExport;
use Maatwebsite\Excel\Facades\Excel;


class ProdukController extends Controller
{
    public function index(){
        $data = Produk::all();
            return view('produk.index', ['dataProduk' => $data]);
    }

    public function create(){
        $kategori = Kategori::all();
        return view('produk.create',compact('kategori'));
    }

    public function store(Request $request){
        $message = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah digunakan',
            'numeric' => ':attribute harus berupa angka'
        ];
        $validatedData = $request->validate([
            'id' => 'required|unique:produk,id',
            'nama_produk' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'stock' => 'required|numeric'
        ], $message);

        $data = new Produk();
        $data->id = $request->id;
        $data->nama_produk = $request->nama_produk;
        $data->kategori_id = $request->kategori;
        $data->harga = $request->harga;
        $data->stock = $request->stock;
        $data->save();
        return redirect('/tampil-produk')-> with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id){
        $data = Produk::find($id);
        $kategoris = Kategori::all();
        return view('produk.edit', ['data'=>$data,'kat'=>$kategoris]);
    }

    public function update(Request $request, $id)
    {
        $data = Produk::find($id);
        $data->nama_produk = $request->nama_produk;
        $data->kategori_id = $request->kategori;
        $data->harga = $request->harga;
        $data->stock = $request->stock;
        $data->update();
        return redirect('/tampil-produk')-> with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id){
        $data = Produk::find($id);
        $data->delete();
        return redirect('/tampil-produk') -> with('success', 'Data Berhasil Dihapus');
    }

    public function excel()
    {
        return Excel::download(new ProdukExport, 'produk.xlsx');
    }

    public function pdf()
    {
        $data = Produk::all();
        return view('produk.pdf', ['dataProduk' => $data]);
    }

    public function chart()
    {
        $dataLabel = Produk::orderBy('nama_produk', 'asc')
            ->pluck('nama_produk')->toArray();

        $dataStock = Produk::orderBy('nama_produk', 'asc')
            ->pluck('stock')->toArray();

        return view('produk.chart', compact('dataLabel', 'dataStock'));
    }
}