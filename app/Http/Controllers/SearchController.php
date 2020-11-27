<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request  $request){

        $searchItem = $request->q;

        $products = Product::query()
            ->where('name', 'LIKE', "%{$searchItem}%")
            ->paginate(9);


        return view('search', compact('products', 'searchItem'));

    }
}
