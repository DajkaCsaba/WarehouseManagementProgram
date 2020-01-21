@extends('layouts.app')

@section('content')

 <div class="col-sm-12 col-md-12 col-lg-12">
      <!--                              Oldal cím                                     -->
      <div class="jumbotron" style="background-image: url(/img/jumbotron-background.jpg); color:#fff;">
       <h1>Kiadás</h1>
      </div>
      <!--                              kiadás form                                  -->
      <div class="row col-md-9 col-lg-9 col-sm-9">
           <div class="panel panel-default">
                <div class="panel-body">
                     <form method="post" action="{{ route('kiadas.update',[$product_id]) }}" style="margin:5%;">
                          {{ csrf_field() }}
                          {{ method_field('PATCH') }}
                          <input type="hidden" name="_method" value="PATCH">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
                              <div class="carousel-inner">
                                <div class="item active">
                                  <table class="table" style="text-align:center; border:none;">
                                  <tr>
                                       <td colspan="3"><h1>A partner adatai</h1> </td>
                                  </tr>
                                  <tr>
                                       <td colspan="3"> <label for="partner_ceg">Név</label></td>
                                  </tr>
                                  <tr>
                                       <td colspan="3"><input type="text" name="partner_ceg" required class="form-control" placeholder="Pl.: Példacég Kft."></td>
                                  </tr>
                                  <tr>
                                       <td colspan="3"><label for="partner_cim">Cím</label></td>
                                  </tr>
                                  <tr>
                                       <td colspan="3"><input type="text" name="partner_cim" required class="form-control" placeholder="Pl.: 4400 Nyíregyháza Sóstói út 31/b"></td>
                                  </tr>
                                  <tr>
                                       <td colspan="3"><label for="partner_adoszam">Adószám</label></td>
                                  </tr>
                                  <tr>
                                       <td colspan="3"> <input type="text" name="partner_adoszam" required class="form-control" placeholder="Pl.: 13781111-2-43"></td>
                                  </tr>
                                  <tr>
                                       <td colspan="3"><label for="partner-szallitasi_cim">Szallítási cím</label></td>
                                  </tr>
                                  <tr>
                                       <td colspan="3"><input type="text" name="partner_szallitasi_cim" required class="form-control" placeholder="Pl.: 4400 Nyíregyháza Sóstói út 36/b"></td>
                                  </tr>
                                  <tr>
                                       <td colspan="3"><label for="partner_szallitas_celja">Szallítás célja</label></td>
                                  </tr>
                                  <tr>
                                       <td colspan="3"><input type="text" name="partner_szallitas_celja" required class="form-control" placeholder="Pl.: Érétkesítés, áthelyezés.."></td>
                                  </tr>
                                </table>

                                </div>

                                <div class="item">
                                  <table class="table" style="text-align:center; border:none;">
                                  <tr>
                                       <td colspan="3"><h1>Kiadható termékek</h1> </td>
                                  </tr>
                                  <tr style="font-weight:bold;">
                                       <td>Név</td><td>Raktáron</td> <td style="width:40%;">Mennyiség</td>
                                  </tr>
                                  @foreach($products as $product)
                                  <div class="form-group" >
                                       <tr>
                                            <td><label style="font-weight:initial;" for="name">{{$product->name}}</label></td>
                                            <td><label style="font-weight:initial;" for="count"> {{$product->count}}</label> </td>
                                            <td><input    type="number"
                                           id="count"
                                           required
                                           name="counts[{{$product->id}}]"
                                           spellcheck="false"
                                           class="form-control"
                                           min="0"
                                           max="{{$product->count}}"
                                           value="0"
                                           /></td>

                                       </tr>
                                  </div>
                                  @endforeach
                                  <tr>

                                       <td colspan="3">
                                            <div class="form-group">
                                                 <input type="submit" class="btn btn-basic pull-right" value="Kiadás"/>
                                            </div>
                                      </td>

                                  </tr>
                                  </table>
                                </div>
                              </div>
                              <!-- Left and right controls -->
                              <div style="margin-left:94%;">
                                <a class="left" href="#myCarousel" data-slide="prev">
                                  <span class="glyphicon glyphicon-chevron-left"></span>
                                  <span class="sr-only">Previous</span>
                                </a>
                                <a class="right" href="#myCarousel" data-slide="next">
                                  <span class="glyphicon glyphicon-chevron-right"></span>
                                  <span class="sr-only">Next</span>
                                </a>
                              </div>
                     </form>
                </div>
           </div>
      </div>
    </div>
      <!--                              Oldal sáv (Eszközök menü)                               -->
      <div class="col-sm-3 col-md-3 col-lg-3 pull-right">
           <div class="sidebar-module">
                <h4 style="font-size:40px;">Eszközök</h4>
                <ol class="list-unstyled" style="font-size:20px;">

                     <li><a href="/products">Vissza a termékekhez</a></li>
                </ol>
           </div>
      </div>
</div>
@endsection
