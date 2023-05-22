<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    //
    private $product;

    public function __construct(Product $product){
        $this->product = $product;
    }

    public function index(){

        $products = $this->product->latest()->paginate(10);
        // $output = implode(',', $products);
        // echo("<script>console.log(".json_encode($products).");</script>");
        return view('products.index', compact('products'));
    }

    public function create(){
        return view('products.create');
    }

    public function store(StoreProductRequest $request){
        // $request = $request->validate([
        //     'name' => 'required',
        //     'content' => 'required'
        // ]);
        $validated = $request->validated();
        $this->product->create($validated);
        return redirect()->route('products.index');
    }

    public function show(Product $product){
        return view('products.show', compact('product'));
    }

    public function edit(Product $product){
        return view('products.edit', compact('product'));
    }

    public function update(StoreProductRequest  $request, Product $product){
        echo("<script>console.log(".json_encode($request).");</script>");
        $validated = $request->validated();
        $product->update($validated);
        return redirect()->route('products.index');
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('products.index');
    }
}
