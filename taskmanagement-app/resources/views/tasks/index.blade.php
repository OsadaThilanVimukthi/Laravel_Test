@extends('layout')
@section('content')

                <div class="card">
                    <div class="card-header">
                        <h2>Task Management</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/tasks/create') }}" class="btn btn-success btn-sm" title="Add New Student">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        {{-- <th>User ID</th> --}}
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Due Date</th>
                                        <th>Priority</th>
                                        <th>Is completed</th>
                                        <th>Is Paid</th>
                                        {{-- <th>Created At</th>
                                        <th>Updated At</th> --}}
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tasks as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td>{{ $item->user_id }}</td> --}}
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->due_date }}</td>
                                        <td>{{ $item->priority }}</td>
                                        <td>{{ $item->is_completed }}</td>
                                        <td>{{ $item->is_paid }}</td>
                                        {{-- <td>{{ $item->file_created }}</td>
                                        <td>{{ $item->file_updated }}</td> --}}
 
                                        <td>
                                            <a href="{{ url('/tasks/' . $item->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/tasks/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
                                            <form method="POST" action="{{ url('/tasks' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
 
                    </div>
                </div>

@endsection