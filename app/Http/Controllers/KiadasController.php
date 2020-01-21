<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class KiadasController extends Controller
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

          return view('kiadas.index',['products'=>$products,'product_id'=>$product_id]);
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
    public function store(Request $request)
    {

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
         $partner = $request;
         $partner_array = array($partner);
         $kiadas = array();
         $db = array();
         $j = 0;
         for($i = 1; $i <= count($request->counts); $i++){
              $product = DB::table('products')->select('count')->where('id', $i)->first();
              $array = json_decode(json_encode($product), true);
              $product_count = array_first($array);
              $new_count = $product_count - (int)$request->counts[$i];
              if($product_count != $new_count){
                $kiadas[$j] = DB::table('products')->select('*')->where('id', $i)->first();
                $db[$j]= (int)$request->counts[$i];
                $j = $j +1;
              }


              $productUpdate = Product::where('id', $i)
                                     ->update([
                                             'count' => $new_count
                                     ]);
         }
         //dd($kiadas);
              if($productUpdate){
                   $pdf = PDF::loadView('pdf.invoice',compact('partner','kiadas','db'));
                       return $pdf->download('invoice.pdf');
                    return redirect()->route('products.index')
                    ->with('success' , 'Sikeres kiadás!');
               }


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
   }/*
    public function szallitolevel()
    {
         $pdf = PDF::loadView('kiadas.szallitolevel');
         return $pdf->download('invoice.pdf');
    }*/
}
