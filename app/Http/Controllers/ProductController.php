<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::all();
        // ->where('id', request()->user()->id)
        // ->orderBy('created_at', 'desc');
        return view('products.index', ['products' => $products]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request, Product $product){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        $data['user_id'] = $request->user()->id;
        $newProduct = Product::create($data);
        
       
        return redirect(route('product.show', ['product' => $product]))->with('success', 'Product created successfully');
        
    }

    public function show(){
        $products = Product::where('user_id','=', request()->user()->id)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('products.show', ['products' => $products]);
    }

    public function edit(Product $product){
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
         
        ]);

        $data['user_id'] = request()->user()->id;
        $product->update($data);

        return redirect(route('product.show'))->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product){
        $product->delete();

        return redirect(route('product.show'))->with('success', 'Product deleted successfully');
    }
}
