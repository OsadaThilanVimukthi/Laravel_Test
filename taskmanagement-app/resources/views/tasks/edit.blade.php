@extends('layout')
@section('content')
<form action="{{ url('tasks/' . $tasks->id) }}" method="post">
    {!! csrf_field() !!}
    @method("PATCH")
    <label>Title</label><br>
    <input type="text" name="title" id="title" class="form-control" value="{{ $tasks->title }}"><br>
    
    <label>Description</label><br>
    <input type="text" name="description" id="description" class="form-control" value="{{ $tasks->description }}"><br>
    
    <label for="due_date">Due Date</label><br>
    <input type="date" name="due_date" id="due_date" class="form-control" value="{{ $tasks->due_date }}"><br>
    
    <label>Priority</label><br>
    <select name="priority" id="priority" class="form-control">
        <option value="low" {{ $tasks->priority == 'low' ? 'selected' : '' }}>Low</option>
        <option value="medium" {{ $tasks->priority == 'medium' ? 'selected' : '' }}>Medium</option>
        <option value="high" {{ $tasks->priority == 'high' ? 'selected' : '' }}>High</option>
    </select><br>
    
    <label for="is_complete">Is Complete</label><br>
    <input type="checkbox" name="is_complete" id="is_complete" class="form-check-input" {{ $tasks->is_completed ? 'checked' : '' }}><br>
    
    <label for="is_paid">Is Paid</label><br>
    <input type="checkbox" name="is_paid" id="is_paid" class="form-check-input" {{ $tasks->is_paid ? 'checked' : '' }}><br>
    
    <input type="submit" value="Save" class="btn btn-success"><br>
</form>

 
@stop