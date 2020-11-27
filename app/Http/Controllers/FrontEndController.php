<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
//        $products = Product::paginate(5);
//        dd($products);
        return view('index', ['products'=> Product::paginate(9)]);
    }

    public function singleProduct($id){

        return view('single', ['product'=>Product::find($id),'relatedBooks' => Product::orderBy('created_at', 'desc')->limit(3)->get() ]);
    }
}
