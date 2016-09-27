@extends('layouts.layout')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="form-group form-group-default detail">
                <label>
                    Description
                </label>
                <div>{!! nl2br($task->description) !!}</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group form-group-default detail">
                <label>
                    Start Date
                </label>
                <div>{{ $task->create_date }}</div>
            </div>
        </div>

        @if($task->finish_date)
            <div class="col-md-6">
                <div class="form-group form-group-default detail">
                    <label>
                        End Date
                    </label>
                    <div>{{ $task->finish_date }}</div>
                </div>
            </div>
        @endif
    </div>

    <div class="form-group"><br><br>
        <a class="btn btn-default btn-raised" href="{{ url('/projects/' . $task->projectId ) }}"
            title="Back to the Project">
           « Back
        </a>
    </div>
@endsection

@section('title')
@endsection

@section('header')
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-8">
                @if(!$task->finish_date)
                    Open Task
                @else
                    Finish Task
                @endif
            </div>
            <div class="col-md-4">
                <div class="pull-right">
                    <a href="{{ url('/tasks/' . $task->id . '/edit' ) }}" title="Edit Task">
                        <img src="/imgs/edit.png" style="width: 20px"></a>&nbsp;&nbsp;
                    @if(!$task->finish_date)
                        @include('tasks.partials._delete_task', [
                            'task' => $task,
                        ])
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
