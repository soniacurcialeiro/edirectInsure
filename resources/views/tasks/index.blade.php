@extends('layouts.layout')

@section('content')
    <table class="table table-hover dataTable no-footer awe-checkbox-list-items">
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td style="width: 90%;">>
                    <a href="{{ url('/tasks/' . $task->id) }}">{!! nl2br($task->description) !!}</a>
                </td>
                <td>
                    <a href="{{ url('/tasks/' . $task->id . '/edit' ) }}" title="Edit Task">
                        <img src="/imgs/edit.png" style="width: 20px"></a>&nbsp;&nbsp;

                    @if(!$task->finish_date)
                        @include('tasks.partials._delete_task', [
                            'task' => $task,
                        ])
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="awe-buttons">
        <a class="btn btn-primary btn-raised awe-create-btn awe-main-action"
           href="{{ url('/tasks/create') }}"
           title="Create Task">
           Create Task
        </a>
    </div>
@endsection

@section('title')
    Tasks
@endsection
