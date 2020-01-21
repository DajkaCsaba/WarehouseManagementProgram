@extends('layouts.app')

@section('content')
<div class="col-sm-12 col-md-12 col-lg-12">
     <!--                               Oldal cím                                     -->
     <div class="jumbotron" style="background-image: url(/img/jumbotron-background.jpg); color:#fff;">
          <h1>{{$product->name}} szerkesztése</h1>
     </div>
     <div class="row col-sm-9 col-md-9 col-lg-9">
          <div class="panel panel-default">
               <div class="panel-body">
                    <form method="post" action="{{ route('products.update', [$product->id]) }}" style="margin:5%;">
                     {{ csrf_field() }}

                     <input type="hidden" name="_method" value="put">

                     <div class="form-group">
                                              <label for="product-name">Név</label>
                                              <input   placeholder="Adja meg a tarmék nevét.."
                                                        id="product-name"
                                                        name="name"
                                                        spellcheck="false"
                                                        class="form-control"
                                                        value="{{$product->name}}"
                                                         />
                    </div>


                    <div class="form-group">
                                             <label for="product-category">Kategória</label>
                                             <input   placeholder="Adja meg a termék kategóriáját.."
                                                       id="product-category"
                                                       name="category"
                                                       spellcheck="false"
                                                       class="form-control"
                                                       value="{{$product->category}}"
                                                       />
                   </div>
                   <div class="form-group">
                                           <label for="product-count">Mennyiség</label>
                                           <input    type="number"
                                                     id="product-count"
                                                     name="count"
                                                     spellcheck="false"
                                                     class="form-control"
                                                     min="0"
                                                     value="{{$product->count}}"
                                                     />
                </div>
                <div class="form-group">
                                         <label for="product-unit">Mértékegység</label>
                                         <input   placeholder="pl.: db/l/m2"
                                                   id="product-unit"
                                                   name="unit"
                                                   spellcheck="false"
                                                   class="form-control"
                                                   value="{{$product->unit}}"
                                                    />
              </div>
              <div class="form-group">
                                      <label for="product-tax">Általános forgalmi adó (ÁFA)</label>
                                      <input   placeholder="27"
                                                id="product-tax"
                                                name="tax"
                                                spellcheck="false"
                                                class="form-control"
                                                value="{{$product->tax}}"
                                                />
           </div>
           <div class="form-group">
                                    <label for="product-netto">Nettó árérték</label>
                                    <input   placeholder=""
                                              id="product-netto"
                                              name="netto"
                                              spellcheck="false"
                                              class="form-control"
                                              type="number"
                                              min="0"
                                              value="{{$product->netto}}"
                                               />
         </div>
                                          <div class="form-group">
                                              <label for="product-content">Leírás</label>
                                              <textarea placeholder="Adja meg a leírást.."
                                                        style="resize: vertical"
                                                        id="product-content"
                                                        name="description"
                                                        rows="5" spellcheck="false"
                                                        class="form-control autosize-target text-left">
                                                        {{$product->description}}
                                                        </textarea>
                                          </div>

                                          <div class="form-group">
                                              <input type="submit" class="btn btn-basic pull-right"
                                                     value="Szerkeszt"/>
                                          </div>
                                      </form>
               </div>
          </div>
     </div>
     <!--                             Eszközök oldal menü                                               -->
     <div class="col-sm-3 col-md-3 col-lg-3 pull-right">
          <div class="sidebar-module">
              <h4 style="font-size:40px;">Eszközök</h4>
              <ol class="list-unstyled" style="font-size:20px;">
                   <br>
                   <li><a href="/products">Vissza a termékekhez</a></li>
              </ol>
          </div>

     </div>
</div>


@endsection
