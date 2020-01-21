@extends('layouts.app')

@section('content')
<div class="col-sm-12 col-md-12 col-lg-12">
     <!--                               Oldal cím                                     -->
     <div class="jumbotron" style="background-image: url(/img/jumbotron-background.jpg); color:#fff;">
          <h1>{{$product->name}}</h1>
          <p>{{$product->description}}</p>
     </div>
     <div class="row col-sm-9 col-md-9 col-lg-9">
          <!--                               Termék tulajdonságai listába rendezve          -->
          <div class="panel panel-default">
               <div class="panel-heading">
                    <h1>A termék tulajdonságai</h1>
               </div>
               <div class="panel-body" style="font-size:20px;">
                    <table class="table">
                         <tr>
                              <td style="font-weight:bold;">A termék azonosítószáma:</td>
                              <td>{{$product->id}}</td>
                         </tr>
                         <tr>
                              <td style="font-weight:bold;">A termék kategóriája:</td>
                              <td>{{$product->category}}</td>
                         </tr>
                         <tr>
                              <td style="font-weight:bold;">A termék raktárban tárolt menyisége:</td>
                              <td>{{$product->count}} {{$product->unit}}</td>
                         </tr>
                         <tr>
                              <td style="font-weight:bold;">A termék általános forgalmi adója: </td>
                              <td>{{$product->tax}} %</td>
                         </tr>
                         <tr>
                              <td style="font-weight:bold;">A termék egységára (netto):</td>
                              <td>{{$product->netto}} Ft</td>
                         </tr>
                         <tr>
                              <td style="font-weight:bold;">A termék egységára (brutto):</td>
                              <td>{{$brutto}} Ft</td>
                         </tr>
                         <tr>
                              <td style="font-weight:bold;">A termék raktáron tárolt összértéke (netto):</td>
                              <td>{{$product->netto * $product->count }} Ft</td>
                         </tr>
                         <tr>
                              <td style="font-weight:bold;">A termék raktáron tárolt összértéke (brutto):</td>
                              <td>{{$brutto * $product->count }} Ft</td>
                         </tr>
                    </table>
               </div>
          </div>
     </div>
     <!--                          Oldal sáv (Eszközök menü) -->
     <div class="col-sm-3 col-md-3 col-lg-3 ">
          <div class="sidebar-module pull-right">
            <h4 style="font-size:40px;">Eszközök</h4>
            <ol class="list-unstyled" style="font-size:20px;">
                 <li><a href="/products/{{$product->id}}/edit"> Termék szerkesztése </a> </li>
                 <li>
                      <a href=""
                         onclick="
                         var result = confirm('Biztosan törölni szeretné a terméket?');
                              if(result){
                                   event.preventDefault();
                                   document.getElementById('delete-form').submit();

                              }
                         ">
                         Termék törlése
                      </a>
                      <form id="delete-form" action="{{ route('products.destroy', [$product->id]) }}" method="POST" style="display:none;">
                           <input type="hidden" name="_method" value="delete">
                           {{ csrf_field() }}
                      </form>

                 </li>
                 <br>
                 <li><a href="/products">Vissza a termékekhez</a></li>
            </ol>
       </div>
     </div>
</div>

@endsection
