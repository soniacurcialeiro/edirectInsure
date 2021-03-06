@extends('layouts.layout')


@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Errors</strong><br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/tasks/' . $task->id) }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        {{ method_field('PATCH') }}

        @include('tasks.partials._form', [
            'task' => $task,
        ])
    </form>

    <div class="form-group"><br><br>
        <a class="btn btn-default btn-raised" href="{{ url('/projects/' . $task->projectId) }}" title="Back to Project">
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
                Update Task created at {{ $task->create_date }}
            </div>
            <div class="col-md-4">
                <div class="pull-right">
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
