@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="container">
                        <div class="task-result">
                            @if($result == 'success')
                                <p>Task was added</p>
                                <a href="/home" class="btn btn-default">Back</a>
                            @else
                                <p>Failed to add task</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
