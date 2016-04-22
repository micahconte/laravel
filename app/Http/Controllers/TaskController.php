<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controllers;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{

	protected $tasks;

	/**
	* Creates a new controller instance
	*
	* @return void
	*/
    public function __construct(TaskRepository $tasks)
    {
    	$this->middleware('auth');
    	$this->tasks = $tasks;
    }

    /**
    * Display a list of all the user's tasks
    *
    * @param Request @request
    * @return Response
    */
    public function index(Request $request)
    {
    	// $tasks = Task::where('user_id', $request->user()->id)->get();
    	return view('tasks.index', [
    		'tasks' => $this->tasks->forUser($request->user())
    	]);
    }

    /**
    * Create a new task
    *
    * @param Request $request
    * @return Response
    */
    public function store(Request $request)
    {
    	$validation = $this->validate($request, [
    		'name' => 'required|max:255|min:2'
    	]);

    	$request->user()->tasks()->create([
    		'name' => $request->name
    	]);

    	return redirect('/tasks')->withErrors($validation);
    }

    /**
    * Destroy the given task
    *
    * @param Request $request
    * @param Task $task
	*
	* @return Response
	*/
	public function destroy(Request $request, Task $task)
	{
    	$this->authorize('destroy', $task);
    	
	    $task->delete();

	    return redirect('/tasks');
	}
}
