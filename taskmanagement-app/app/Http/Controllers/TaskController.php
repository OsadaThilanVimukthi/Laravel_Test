<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Task;
use Illuminate\View\View;
use Redirect;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tasks = Task::all();
        return view('tasks.index')->with('tasks', $tasks);        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        //i did not implented the loging section
        
        $input['user_id'] = auth()->id(); 
    
        // Convert checkbox values to boolean
        $input['is_complete'] = $request->has('is_complete') ? 1 : 0;
        $input['is_paid'] = $request->has('is_paid') ? 1 : 0;
    
        Task::create($input);
        return redirect('tasks')->with('flash_message', 'Task Added!');
    }
    
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tasks = Task::find($id);
        return view('tasks.show')->with('tasks', $tasks);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $tasks = Task::find($id);
        return view(view: 'tasks.edit')->with('tasks', $tasks);        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $tasks = Task::find($id);
        
        // Get all input
        $input = $request->all();
        
        // Handle boolean values for checkboxes (is_paid, is_completed)
        $input['is_paid'] = $request->has('is_paid') ? 1 : 0;
        $input['is_completed'] = $request->has('is_complete') ? 1 : 0;
        
        // Update the task with the input
        $tasks->update($input);
    
        return redirect('tasks')->with('flash_message', 'Task Updated!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Task::destroy($id);
        return redirect('tasks')->with('flash_message', 'Task deleted!'); 
    }
}
