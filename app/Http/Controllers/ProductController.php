<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        View::share(['products' => $products]);
        return view('product.index');
    }
    public function quickview(Request $request)
    {
        $product = Product::find($request->id);
        return response()->json([
            'success' => 1,
            'view' => view('quick-view-modal', compact('product'))->render()
        ]);
    }
}
