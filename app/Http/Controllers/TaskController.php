<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ValidationRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::check()) {
            $tasks = $request->user()->tasks()->orderBy('created_at', 'asc')->paginate(config('setting.paginate'));

            return view('tasks', compact('tasks'));
        }
        
        return redirect()->action('TaskController@index');
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
    public function store(ValidationRequest $request)
    {
        try {
            $request->user()->tasks()->create([
                'name' => $request->input('name'),
            ]);

            return redirect()->action('TaskController@index');
        } catch (Exception $e) {

            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try {
            $task = Task::findOrFail($id);
            $this->authorize('destroy', $task);
            $task->delete();
            
            return redirect()->action('TaskController@index');
        } catch (Exception $e) {
            
            return back();
        } 
    }
}
