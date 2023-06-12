<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'msg' => 'Data Berhasil Menampilkan Data',
            'code' => 200,
            'data' => $products,
        ]);
    }

    public function show($id)
    {
        $products = Product::find($id);
        return response()->json([
            'msg' => 'Data Berhasil Menampilkan Data',
            'code' => 200,
            'data' => $products,
        ]);
    }

    public function store(Request $request)
    {
        $result = $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'qty' => 'required|numeric',
            'deskripsi' => 'required',
        ]);

        $products = Product::create($result);

        return response()->json([
            'msg' => 'Data Berhasil Menampilkan Data',
            'code' => 200,
            'data' => $products,
        ]);
    }

    public function update(Request $request, $id)
    {
        $result =  $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'qty' => 'required|numeric',
            'deskripsi' => 'required',
        ]);

        $products = Product::find($id);
        $products->nama = $result['nama'];
        $products->harga = $result['harga'];
        $products->qty = $result['qty'];
        $products->deskripsi = $result['deskripsi'];

        $products->save();

        return response()->json([
            'msg' => 'Data Berhasil Menampilkan Data',
            'code' => 200,
            'data' => $products,
        ]);
    }

    public function delete($id)
    {
        $products = Product::find($id);
        $products->delete();

        return response()->json([
            'msg' => 'Data Berhasil Menampilkan Data',
            'code' => 200,
            'data' => $products,
        ]);
    }
}
