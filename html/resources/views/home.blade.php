@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">

                        <div class="tasks-table">
                            <div class="row">
                                <div class="col-lg-6 col-md-8 col-xs-8">
                                    <h2>Tasks List</h2>
                                    <p>Now you have next tasks:</p>
                                </div>
                                <div class="col-lg-6 col-md-4 col-xs-4">
                                    <button type="modal" class="task-add-btn btn btn-default" data-toggle="modal" data-target="#addTaskModal">Add task</button>
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Value</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <td>{{$task->id}}</td>
                                        <td>{{$task->name}}</td>
                                        <td>{{$task->value}}</td>
                                        <td>{{$task->status}}</td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Modal -->
                        <div id="addTaskModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Add new task</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" action="/task" method="POST">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="name">Name:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="value">Value:</label>
                                                <div class="col-sm-10">
                                                    <select class="selectpicker" name="value">
                                                        <option>5</option>
                                                        <option>10</option>
                                                        <option>15</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-default">Add task</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
