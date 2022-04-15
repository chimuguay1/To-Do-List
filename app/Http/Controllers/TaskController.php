<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('status', 0)->get();
        return view('To-Do-List.task.index')->with('tasks', $tasks);
    }

    /**
     * Show a list of the completed resource
     *
     * @return \Illuminate\Http\Response
     */
    public function completed()
    {
        $tasks = Task::where('status', 1)->get();
        return view('To-Do-List.task.completed')->with('tasks', $tasks);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('To-Do-List.task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required',
                'description' => 'required',
            ]);

            Task::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            return redirect('task')->with('message', __('Task added successfully'));
        } catch (\Exception $e) {
            return redirect('task')->with('message', __('Error adding task'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view('To-Do-List.task.edit', compact('task'));
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
        try {
            $this->validate($request, [
                'title' => 'required',
                'description' => 'required',
                
            ]);
            $tasks = Task::find($id);
            $tasks->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            return redirect('task')->with('message', __('Task Updated Successfully'));
        } catch (\Exception $e) {
            return redirect('task')->with('message', __('Error adding task'));
        }
    }

        /**
     * Update the status resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatusTask($id)
    {
        try {
            $tasks = Task::find($id);
            $tasks->status = 1;
            $tasks->completed_at = Carbon::now();
            $tasks->save();

            return redirect('task/completed')->with('message', __('Task completed successfully'));
        } catch (\Exception $e) {
            return redirect('task')->with('message', __('Error adding task'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tasks = Task::find($id);
        $tasks->delete();
        return back()->with('message', __('Task deleted successfully'));
    }

    /**
     * Remove All resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyAll()
    {
        $tasks = Task::where('status', 1)->get();
        $tasks->each->delete();
        return redirect('task/completed')->with('message', __('Successfully deleted tasks'));
    }
}
