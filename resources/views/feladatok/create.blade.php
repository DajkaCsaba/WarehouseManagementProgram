@extends('layouts.app')

@section('content')
<div class="col-sm-12 col-md-12 col-lg-12">
     <!--                                    oldal cím                                     -->
     <div class="jumbotron" style="background-image: url(/img/jumbotron-background.jpg); color:#fff;">
      <h1>Új feladat hozzáadása</h1>
     </div>

     <!--                                    Feladat létrehozás form                           -->
         <div class="row col-md-9 col-lg-9 col-sm-9" >
              <div class="panel panel-default">
               <div class="panel-body">
                     <form method="post" action="{{ route('feladatok.store') }}" style="margin:5%;">
                       {{ csrf_field() }}

                       <div class="form-group">
                                               <label for="product-name">A feladat megnevezése<span class="required">*</span></label>
                                               <input   placeholder="Adja meg a feladat nevét.."
                                                         id="task-name"
                                                         required
                                                         name="name"
                                                         spellcheck="false"
                                                         class="form-control"

                                                          />
                     </div>


                     <div class="form-group">
                                              <label for="task">A feladat<span class="required">*</span></label>
                                              <textarea   placeholder="Adja meg feladatát.."
                                                        style="resize: vertical"
                                                        rows="2"
                                                        id="task"
                                                        required
                                                        name="task"
                                                        spellcheck="false"
                                                        class="form-control autosize-target"

                                                        /></textarea>
                    </div>
                    <div class="form-group">
                                            <label for="deadline">Határidő<span class="required">*</span></label>
                                            <input    type="datetime-local"
                                                      id="deadline"
                                                      required
                                                      name="deadline"
                                                      spellcheck="false"
                                                      class="form-control"


                                                       />
                  </div>
                                           <div class="form-group">
                                               <input type="submit" class="btn btn-basic"
                                                      value="Létrehoz"/>
                                           </div>
                                       </form>
               </div>
              </div>

       </div>
       <!--                                      oldal sáv (Eszközök menü)                                     -->
       <div class="col-sm-3 col-md-3 col-lg-3 pull-right">
          <div class="sidebar-module">
              <h4 style="font-size:40px;">Eszközök</h4>
              <ol class="list-unstyled" style="font-size:20px;">
                   <br>
                   <li><a href="/feladatok">Vissza a feladatokhoz</a></li>
                   <li><a href="/products">Vissza a termékekhez</a></li>
              </ol>
          </div>

     </div>

@endsection
