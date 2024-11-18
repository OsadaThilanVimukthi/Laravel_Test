@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
      
      <form action="{{ url('tasks/' .$tasks->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <label>Title</label></br>
        <input type="text" name="title" id="title" class="form-control"></br>
        <label>Description</label></br>
        <input type="text" name="description" id="description" class="form-control"></br>
        <label for="due_date">Due Date</label><br>
        <input type="date" name="due_date" id="due_date" class="form-control"><br>
        <label>Priority</label></br>
        <select name="priority" id="priority" class="form-control">
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
        </select></br>
        <label for="is_complete">Is Complete</label></br>
        <input type="checkbox" name="is_complete" id="is_complete" class="form-check-input"></br>
        <label for="is_complete">Is Paid</label></br>
        <input type="checkbox" name="is_paid" id="is_paid" class="form-check-input"></br>                 
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop