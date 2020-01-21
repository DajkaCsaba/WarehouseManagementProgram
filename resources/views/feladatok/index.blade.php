@extends('layouts.app')

@section('content')<!--
<div class="col-sm-12 col-md-12 col-lg-12">
     <!--                                    Oldal cím-->
     <div class="jumbotron col-sm-offset-2 col-sm-9" style="background-image: url(/img/jumbotron-background.jpg); color:#fff;">
          <h1>Feladatok</h1>
     </div>

<div class="panel panel-default col-sm-offset-2 col-sm-6">
     <div class="panel-heading" style="font-weight:bold;">
         Új feladat hozzáadása
     </div>
     <div class="panel-body">
            <!-- New Task Form -->
            <form action="{{ route('feladatok.store') }}" method="POST" class="form-horizontal">
               {{ csrf_field() }}

               <!-- Task Name -->
               <div class="form-group">
                    <label for="task-name" class="control-label">Feladat megnevezése:</label>

                    <div>
                        <input type="text" name="name" id="task-name" class="form-control">
                    </div>
               </div>
               <div class="form-group">
                                        <label for="task" class="control-label">A feladat:</label>
                                        <div>
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

              </div>
              <div class="form-group">
                                      <label for="deadline" class="control-label">Határidő</label>
                                      <div>
                                           <input    type="datetime-local"
                                                     id="deadline"
                                                     required
                                                     name="deadline"
                                                     spellcheck="false"
                                                     class="form-control"


                                                      />
                                      </div>
               </div>

               <!-- Add Task Button -->
               <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-4">
                        <button type="submit" class="btn btn-default" >
                            <i class="fa fa-plus"></i> Feladat hozzáadása
                        </button>
                    </div>
               </div>
            </form>
        </div>
   </div>
        <div class="col-sm-3 pull-right">
           <div class="sidebar-module">
               <h4 style="font-size:40px;">Eszközök</h4>
               <ol class="list-unstyled" style="font-size:20px;">
                    <li><a href="/products">Vissza a termékekhez</a></li>
               </ol>
           </div>
        </div>


   <!-- Current Tasks -->
    @if (count($tasks) > 0)
        <div class="panel panel-default col-sm-offset-2 col-sm-6">
            <div class="panel-heading" style="font-weight:bold;">
                Jelenleg hozzáadott feladatok
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Feladat neve</th>
                        <th>Feladat határideje</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr @if ($task->deadline < date("Y-m-d h:m:s")) style="background:#c94c4c;color:white;" @endif>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div><a href="" onclick="alert('{{$task->task}}')" @if ($task->deadline < date("Y-m-d")) style="color:white;" @endif>{{ $task->name }}</a></div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $task->deadline }}</div>
                                </td>

                                <td>
                                     <form id="delete-form" action="{{route('feladatok.destroy', [$task->id])}}" method="POST">
                                          <input type="hidden" name="_method" value="delete">
                                          {{ csrf_field() }}

                                        <button class="btn btn-default" style="background:red;color:white;"><span class="glyphicon glyphicon-trash"></button>
                                     </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif


@endsection
