<?php

namespace App\Http\Controllers;

use App\Http\Requests\admin\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Product::paginate(10);

        return view('pages.admin.product.index', [
            'query' => $query
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('pages.admin.product.create', [
            'categories' => $categories
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['slug'] = \Illuminate\Support\Str::slug($request->name);

        // Simpan hanya satu foto (string path)
        if ($request->hasFile('photos')) {
            $image = $request->file('photos');
            $path = $image->store('products', 'public');
            $data['photos'] = $path;
        } else {
            $data['photos'] = null;
        }

        \App\Models\Product::create($data);

        return redirect()->route('product')->with('success', 'Produk berhasil ditambahkan!');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Product::findOrFail($id);
        $categories = Category::all();

        return view('pages.admin.product.edit', [
            'item' => $item,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, $id)
    {
        $data = $request->except('photos');
        $data['slug'] = \Illuminate\Support\Str::slug($request->name);
        $data['material'] = $request->material;
        $item = \App\Models\Product::findOrFail($id);
        if ($request->hasFile('photos')) {
            $image = $request->file('photos');
            $data['photos'] = $image->store('products', 'public');
        }
        $item->update($data);
        return redirect()->route('product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Product::findOrFail($id);
        $item->delete();

        return redirect()->route('product');
    }
}
