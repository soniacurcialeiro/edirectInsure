@if($tasks->isEmpty())
    There are no tasks
@endif
<table class="table table-hover dataTable no-footer awe-checkbox-list-items">
    <tbody>
        @foreach($tasks as $task)
        <tr>
            @if(!$task->finish_date)
                <td style="width: 3%" class="text-center">

                    <a class="close-btn js-on-click" data-on-click="closeAction" href="#"
                       title="Click to Finish the Task"
                       data-close-url="{{ url('/tasks/' . $task->id . '/close' ) }}"
                       data-close-parent="{{ $task->projectId }}"
                       data-close-id="{{ $task->id }}">
                       <img src="/imgs/close.png" style="width: 20px">
                    </a>

                </td>
            @endif
            <td title="{{ ($task->finish_date) ? 'Finished at ' . $task->finish_date : '' }}">
                <a href="{{ url('/tasks/' . $task->id) }}">{!! nl2br($task->description) !!}</a>
            </td>
            <td style="width: 10%">
                @if(!$task->finish_date)
                    <a href="{{ url('/tasks/' . $task->id . '/edit' ) }}" title="Edit Task">
                    <img src="/imgs/edit.png" style="width: 20px"></a>&nbsp;&nbsp;

                    @include('tasks.partials._delete_task', [
                        'task' => $task,
                    ])
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
