<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         if( Auth::check() ){
          $tasks = Task::where('user_id', Auth::user()->id)->get();
          return view('feladatok.index',['tasks'=>$tasks]);
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
        return view('feladatok.create');
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
            $task = Task::create([
                'name' => $request->input('name'),
                'task' => $request->input('task'),
                'deadline' => $request->input('deadline'),
                'user_id' => Auth::user()->id
            ]);
            if($task){
                return redirect()->route('feladatok.index', ['task'=> $task])
                ->with('success' , 'Feladat sikeresen létrehozva!');
            }
        }

            return back()->withInput()->with('errors', 'Hiba történt a feladat létrehozása közben!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {

        $task = Task::where('id', $task->id);
        return view('feladatok.show', ['task'=> $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
         
         $taskDelete = Task::where('id', $task->id)->delete();

         if($taskDelete){
              return redirect()->route('feladatok.index')
              ->with('success', 'A feladat sikeresen törölve!');
         }
         return back()->withInput()->with('errors', 'Hiba történt a feladat törlése közben!');
    }
}
