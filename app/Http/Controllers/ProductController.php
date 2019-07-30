<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Carbon\Carbon;

class ProductController extends Controller
{
  function __construct()
  {
    $this->middleware('auth');
  }
    function addproduct()
    {
      $products = Product::orderBy('id', 'desc')->paginate(5);
      return view('product/view', compact('products'));
    }
    function productinsert(Request $request)
    {
      $request->validate([
        'product_name' => 'required',
        'product_price' => 'required|integer',
        'product_quantity' => 'required|integer',
      ]);
      //after validation
      Product::insert([
        'product_name' => $request->product_name,
        'product_price' => $request->product_price,
        'product_quantity' => $request->product_quantity,
        'created_at' => Carbon::now('Asia/Dhaka'),

      ]);
      return back()->with('success', 'Product inserted succesfully!');
    }
    function productdelete($product_id)
    {
      Product::find($product_id)->delete();
      return back()->with('successdelete', 'Product deleted successfully');
    }
    function productedit($product_id)
    {
      $product = Product::findOrFail($product_id);
      return view('product/edit', compact('product'));
    }
    function productupdate(Request $request )
    {
      Product::find($request->product_id)->update([
        'product_name' => $request->product_name,
        'product_price' => $request->product_price,
        'product_quantity' => $request->product_quantity,
      ]);
      return back();
    }
}
