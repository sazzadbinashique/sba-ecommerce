<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('products.index', ['products' => Product::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image'
        ]);

        $product = new Product;
        $product_image = $request->image;
        $product_image_new_name = time() . $product_image->getClientOriginalName();
        $product_image->move('uploads/products', $product_image_new_name);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = 'uploads/products/' . $product_image_new_name;
        $product->save();

        Session::flash('success', 'Product created.');

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact( 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        if($request->hasFile('image'))
        {
            $product_image = $request->image;
            $product_image_new_name = time() . $product_image->getClientOriginalName();
            $product_image->move('uploads/products', $product_image_new_name);
            $product->image = 'uploads/products/' . $product_image_new_name;
            $product->save();
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        Session::flash('success', 'Product updated.');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        if(file_exists($product->image))
        {
            unlink($product->image);
        }

        $product->delete();

        Session::flash('success', 'Product deleted.');

        return redirect()->back();
    }
}
