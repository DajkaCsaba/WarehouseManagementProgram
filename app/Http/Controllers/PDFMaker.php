<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use PDF;


class PDFMaker extends Controller
{
    //
    public function make(){

         $pdf = PDF::loadView('pdf.invoice');
         return $pdf->download('invoice.pdf');
    }
}
