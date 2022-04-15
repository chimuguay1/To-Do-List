<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasks = count(Task::where('status', 0)->get());
        $tasksCompleted = count(Task::where('status', 1)->get());

        return view('dashboard', compact('tasks', 'tasksCompleted'));
    }
}
