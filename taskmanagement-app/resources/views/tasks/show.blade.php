@extends('layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Task Details</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Title : {{ $tasks->title }}</h5>
        <p class="card-text">Description : {{ $tasks->description }}</p>
        <p class="card-text">Due Date : {{ $tasks->due_date }}</p>
        <p class="card-text">Is Completed : {{ $tasks->is_completed }}</p>
        <p class="card-text">Is Paid : {{ $tasks->is_paid }}</p>

  </div>
       
    </hr>
  
  </div>
</div>
@stop