<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         if( Auth::check() ){
           $products = Product::where('user_id', Auth::user()->id)->get();

           return view('products.index',['products'=>$products]);
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
                    ->with('success' , 'Product created successfully');
                }
           }

                return back()->withInput()->with('errors', 'Error creating new product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product = Product::find($product->id);
        $brutto = (($product->netto / 100) * $product->tax) + $product->netto;
        return view('products.show', ['product' => $product, 'brutto' => $brutto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product = Product::find($product->id);
        return view('products.edit', ['product' => $product]);
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
        $productUpdate = Product::where('id', $product->id)
                                   ->update([
                                             'name' => $request->input('name'),
                                             'category' => $request->input('category'),
                                             'count' => $request->input('count'),
                                             'unit' => $request->input('unit'),
                                             'tax' => $request->input('tax'),
                                             'netto' => $request->input('netto'),
                                             'description' => $request->input('description'),

                                   ]);
        if($productUpdate){
             return redirect()->route('products.index')
             ->with('success', 'A terméket sikeresen frissítve!');
        }
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

        $productDelete = Product::where('id', $product->id)->delete();
        if($productDelete){
             return redirect()->route('products.index')
             ->with('success', 'A termék sikeresen törölve!');
        }

    }
}
