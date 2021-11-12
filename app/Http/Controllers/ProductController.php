<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    function index()
    {
        $products = Product::all();
        return view('admin.products.list', compact('products'));
    }

    function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    function store(CreateProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->content = $request->content_product;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $product->image = $path;
        }
        $product->save();

        return redirect()->route('products.index');
    }

    function update($id) {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.update', compact('product', 'categories'));
    }

    function edit(Request $request, $id) {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->content = $request->content_product;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            // xoa anh cu
            Storage::delete('public/' . $product->image);
            //cap nhat anh moi
            $path = $request->file('image')->store('images', 'public');
            $product->image = $path;
        }
        $product->save();
        return redirect()->route('products.index');
    }

    function delete(Request $request){
        try {
            $productId = $request->productId;
            Product::destroy($productId);
            $data = [
              'status' => 'success',
              'message' => 'Xoá thành công!'
            ];
        }catch (\Exception $exception) {
            $data = [
                'status' => 'error',
                'message' => 'Lỗi hệ thống!'
            ];
        }

        return response()->json($data);
    }
}
