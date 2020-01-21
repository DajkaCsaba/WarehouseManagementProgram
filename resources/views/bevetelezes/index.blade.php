@extends('layouts.app')

@section('content')

 <div class="col-sm-12 col-md-12 col-lg-12">
      <!--                             Oldal cím                                               -->
      <div class="jumbotron" style="background-image: url(/img/jumbotron-background.jpg); color:#fff;">
       <h1>Bevételezés</h1>
      </div>
      <!--                             Új termék létrehozása form                                              -->
          <div class="row col-md-4 col-lg-4 col-sm-4">
               <div class="panel panel-default">
                    <div class="panel-heading">
                         <h3 style="text-align:center;">Új létrehozása</h3>
                    </div>
                 <div class="panel-body">
                      <form method="post" action="{{ route('products.store') }}" style="margin:5%;">
                        {{ csrf_field() }}

                        <div class="form-group">
                                                <label for="product-name">Név<span class="required">*</span></label>
                                                <input   placeholder="Adja meg a tarmék nevét.."
                                                          id="product-name"
                                                          required
                                                          name="name"
                                                          spellcheck="false"
                                                          class="form-control"

                                                           />
                       </div>


                       <div class="form-group">
                                               <label for="product-category">Kategória<span class="required">*</span></label>
                                               <input   placeholder="Adja meg a termék kategóriáját.."
                                                         id="product-category"
                                                         required
                                                         name="category"
                                                         spellcheck="false"
                                                         class="form-control"

                                                         />
                     </div>
                     <div class="form-group">
                                             <label for="product-count">Mennyiség<span class="required">*</span></label>
                                             <input    type="number"
                                                       id="product-count"
                                                       required
                                                       name="count"
                                                       spellcheck="false"
                                                       class="form-control"
                                                       min="0"
                                                        />
                   </div>
                   <div class="form-group">
                                           <label for="product-unit">Mértékegység<span class="required">*</span></label>
                                           <input   placeholder="pl.: db/l/m2"
                                                     id="product-unit"
                                                     required
                                                     name="unit"
                                                     spellcheck="false"
                                                     class="form-control"

                                                      />
                 </div>
                 <div class="form-group">
                                         <label for="product-tax">Adó<span class="required">*</span></label>
                                         <input   placeholder="27"
                                                   id="product-tax"
                                                   required
                                                   name="tax"
                                                   spellcheck="false"
                                                   class="form-control"

                                                   />
              </div>
              <div class="form-group">
                                      <label for="product-netto">Nettó árérték<span class="required">*</span></label>
                                      <input   placeholder=""
                                                id="product-netto"
                                                required
                                                name="netto"
                                                spellcheck="false"
                                                class="form-control"
                                                type="number"
                                                min="0"
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
                                                          </textarea>
                                            </div>

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-basic pull-right"
                                                       value="Létrehoz"/>
                                            </div>
                                        </form>
                 </div>
               </div>
        </div>


                                    <!--                        Meglévő hozzáadása                      -->

        <div class="col-md-4 col-lg-4 col-sm-4" >
             <div class="panel panel-default">
                  <div class="panel-heading">
                       <h3 style="text-align:center;">Tárolt termék hozzáadása</h3>
                  </div>
              <div class="panel-body">

                   <form method="POST" action="{{ route('bevetelezes.update',[$product_id]) }}" style="margin:5%;">
                     {{ csrf_field() }}
                     {{ method_field('PATCH') }}
                     <input type="hidden" name="_method" value="PATCH">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     <div class="form-group">
                                             <label for="product-name">Név<span class="required">*</span></label>
                                             <select class="form-control m-bot15" name="product_id">

                                                  @if( $products->count() > 0 )
                                                       @foreach($products as $product)
                                                            <option value="{{$product->id}}">{{$product->name}}</option>
                                                       @endForeach
                                                  @else
                                                       Nem találtam terméket ebben a raktárban!
                                                  @endif
                                             </select>
                   </div>

                  <div class="form-group">
                                         <label for="product-count">Mennyiség<span class="required">*</span></label>
                                         <input    type="number"
                                                    id="product-count"
                                                    required
                                                    name="count"
                                                    spellcheck="false"
                                                    class="form-control"
                                                    min="0"
                                                     />
               </div>

                                        <div class="form-group">
                                             <input type="submit" class="btn btn-basic pull-right"
                                                    value="Hozzáad"/>
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
