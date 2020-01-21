@extends('layouts.app')

@section('content')
<div class="col-sm-12 col-md-12 col-lg-12">
     <!--                               Oldal cím                                     -->
     <div class="jumbotron" style="background-image: url(/img/jumbotron-background.jpg); color:#fff;">
          <h1>{{Auth::user()->storageName}}</h1>
     </div>
     <!--                               Termékek listája táblázatba rendezve
     <div class="row col-sm-9 col-md-9 col-lg-9 ">
          <div class="panel panel-default">
               <div class="panel-heading" style="font-weight:bold;">
                    {{Auth::user()->storageName}} raktárban tárolt termékek listája
               </div>

               <table class="table" style="text-align:center;">
                    <tr style="font-weight:bold;">
                         <td>#</td><td>Név</td> <td>Kategória</td> <td>Mennyiség</td><td>Mértékegység</td>
                    </tr>

                    @foreach($products as $product)
                    <tr>
                         <td>{{$product->id}}</td>
                         <td><a href="/products/{{$product->id}}">{{$product->name}}</a> </td>
                         <td>{{$product->category}}</td>
                         <td>{{$product->count}}</td>
                         <td>{{$product->unit}}</td>
                    </tr>
                    @endforeach
               </table>
          </div>
     </div>-->
     <div class="row col-sm-9 col-md-9 col-lg-9 ">
          <table class="table" id="termekek">
               <thead>
                    <tr>
                         <th>#</th>
                         <th>Név</th>
                         <th>Kategória</th>
                         <th>Mennyiség</th>
                         <th>Mértékegység</th>
                    </tr>
               </thead>
               <tfoot>
                    <tr>
                         <th>#</th>
                         <th>Név</th>
                         <th>Kategória</th>
                         <th>Mennyiség</th>
                         <th>Mértékegység</th>
                    </tr>
               </tfoot>
               <tbody>
                    @foreach ($products as $product)
                         <tr>
                              <td>{{$product->id}}</td>
                              <td><a href="/products/{{$product->id}}">{{$product->name}}</a> </td>
                              <td>{{$product->category}}</td>
                              <td>{{$product->count}}</td>
                              <td>{{$product->unit}}</td>
                         </tr>
                         @endforeach
               </tbody>
          </table>
          <script>
               $(document).ready(function() {
                    $('#termekek').DataTable();
               });
          </script>
     </div>
     <!--                          Oldal sáv (Eszközök menü) -->
     <div class="col-sm-3 col-md-3 col-lg-3 ">
          <div class="sidebar-module pull-right">
            <h4 style="font-size:40px;">Eszközök</h4>
            <ol class="list-unstyled" style="font-size:20px;">
                 <li><a href="/bevetelezes">Bevételezés</a></li>
                 <li><a href="/kiadas">Kiadás</a></li>
                 <li><a href="/feladatok">Feladatok</a></li>
            </ol>
       </div>
     </div>
</div>
@endsection
