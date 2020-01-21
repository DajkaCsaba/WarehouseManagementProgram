<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BevetelezesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($product_id = null)
    {
         if( Auth::check() ){
           $products = Product::where('user_id', Auth::user()->id)->get();

           return view('bevetelezes.index',['products'=>$products,'product_id'=>$product_id]);
      }
      return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {

         if(Auth::check()){
                    $product = Product::create([
                        'name' => $request->input('name'),
                        'category' => $request->input('category'),
                        'count' => $request->input('count'),
                        'unit' => $request->input('unit'),
                        'tax' => $request->input('tax'),
                        'netto' => $request->input('netto'),
                        'description' => $request->input('description'),
                        'user_id' => Auth::user()->id
                    ]);
                    if($product){
                     return redirect()->route('products.index')
                     ->with('success' , 'Company created successfully');
                 }
             }

                 return back()->withInput()->with('errors', 'Error creating new company');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

         $product_id = $request->input('product_id');
         $add = (int)$request->input('count');
         $product = DB::table('products')->select('count')->where('id', $product_id)->first();
         $array = json_decode(json_encode($product), true);
         $product_count = array_first($array);
         $new_count_value = $add + $product_count;
         //dd($product);

         $productUpdate = Product::where('id', $product_id)
                                ->update([
                                        'count' => $new_count_value
                                ]);
      if($productUpdate){
          return redirect()->route('products.index')
          ->with('success' , 'Storage updated successfully');
      }
      //redirect
      return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
