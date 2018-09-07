<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Session;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('products.index', ['products' => Product::All()]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);

        $product = new Product;

        $product_image = $request->image;

        $product_image_new_name = time().$product_image->getClientOriginalName();

        $product_image->move('uploads/products', $product_image_new_name);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = 'uploads/products/'. $product_image_new_name;

        $product->save();

        Session::flash('success', 'Product created');

        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        return view('products.edit', ['product' => Product::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $product = Product::find($id);

        if($request->hasFile('image'))
        {
            $product_image = $request->image;

            $product_image_new_name = time().$product_image->getClientOriginalName();

            $product_image->move('uploads/products', $product_image_new_name);

            $product->image = 'uploads/products/'. $product_image_new_name;

        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        Session::flash('success', 'Product updated');

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {

        $product = Product::find($id);

        if(file_exists($product->image))
        {
            unlink($product->image);
        }

        $product->delete();

        Session::flash('success', 'Product deleted');

        return redirect()->back();
    }
}
