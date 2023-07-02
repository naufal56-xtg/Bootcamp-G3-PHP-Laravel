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
            'msg' => 'Product Berhasil Ditampilkan',
            'status' => 200,
            'data' => $products
        ]);
    }

    public function show($id)
    {
        $products = Product::find($id);

        return response()->json([
            'msg' => 'Product Berhasil Ditampilkan',
            'status' => 200,
            'data' => $products
        ]);
    }

    public function delete($id)
    {
        $products = Product::find($id);
        if (!empty($products->foto)) {
            $pathImage = public_path('images/' . $products->foto);
            if (file_exists($pathImage)) {
                unlink($pathImage);
            }
        }
        $products->delete();

        return response()->json([
            'msg' => 'Product Berhasil Ditampilkan',
            'status' => 200,
            'data' => $products
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'foto' => 'required|image|max:2048',
            'harga' => 'required|numeric',
            'desc' => 'nullable',
            'qty' => 'required|numeric',
        ]);

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            $data['foto'] = $imageName;
        }

        $products = Product::create($data);

        return response()->json([
            'msg' => 'Product Berhasil Ditampilkan',
            'status' => 200,
            'data' => $products
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'foto' => 'nullable',
            'harga' => 'required|numeric',
            'desc' => 'nullable',
            'qty' => 'required|numeric',
        ]);
        $products = Product::find($id);

        if ($request->hasFile('foto')) {
            $data = $request->validate([
                'nama' => 'required|string',
                'foto' => 'nullable|image',
                'harga' => 'required|numeric',
                'desc' => 'nullable',
                'qty' => 'required|numeric',
            ]);

            if (!empty($products->foto)) {
                $pathImage = public_path('images/' .  $products->foto);

                if (file_exists($pathImage)) {
                    unlink($pathImage);
                }
            }
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            $data['foto'] = $imageName;
        }

        $products->update($data);

        return response()->json([
            'msg' => 'Product Berhasil Ditampilkan',
            'status' => 200,
            'data' => $products
        ]);
    }
}
