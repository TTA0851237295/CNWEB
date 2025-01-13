<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('store')->paginate(5);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stores = Store::all();
        return view('products.create', compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Tên sản phẩm: bắt buộc, là chuỗi.
            'description' => 'nullable|string', // Mô tả: không bắt buộc.
            'price' => 'required|numeric|min:0.01', // Giá: bắt buộc, là số, lớn hơn 0.
            'store_id' => 'required|exists:stores,id', // Cửa hàng: bắt buộc, phải tồn tại trong bảng stores.
        ], [
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'name.string' => 'Tên sản phẩm phải là một chuỗi.',
            'description.string' => 'Mô tả phải là một chuỗi.',
            'price.required' => 'Giá là bắt buộc.',
            'price.numeric' => 'Giá phải là một số.',
            'price.min' => 'Giá phải lớn hơn 0.',
            'store_id.required' => 'Cửa hàng là bắt buộc.',
            'store_id.exists' => 'Cửa hàng không tồn tại.',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được thêm thành công.');
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
    public function edit(string $id)
    {
        $product = Product::findOrFail($id); // Lấy sản phẩm theo ID
        $stores = Store::all(); // Lấy tất cả cửa hàng để hiển thị trong dropdown
        return view('products.edit', compact('product', 'stores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Tên sản phẩm: bắt buộc, là chuỗi.
            'description' => 'nullable|string', // Mô tả: không bắt buộc.
            'price' => 'required|numeric|min:0.01', // Giá: bắt buộc, là số, lớn hơn 0.
            'store_id' => 'required|exists:stores,id', // Cửa hàng: bắt buộc, phải tồn tại trong bảng stores.
        ], [
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'name.string' => 'Tên sản phẩm phải là một chuỗi.',
            'description.string' => 'Mô tả phải là một chuỗi.',
            'price.required' => 'Giá là bắt buộc.',
            'price.numeric' => 'Giá phải là một số.',
            'price.min' => 'Giá phải lớn hơn 0.',
            'store_id.required' => 'Cửa hàng là bắt buộc.',
            'store_id.exists' => 'Cửa hàng không tồn tại.',
        ]);
    
        $product = Product::findOrFail($id);
        $product->update($request->all()); // Cập nhật sản phẩm
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được xóa thành công.');
    }
}
