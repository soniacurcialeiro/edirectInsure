<div id='project'>
    {{-- ToDo List --}}
    <div class="form-group">
        <p><label>To Do</label></p>
        <div class="row">
            <div class="col-md-12" id="todoList">
                {!! $tasksToDo !!}
            </div>
        </div>
    </div>

    {{-- Done tasks --}}
    <div class="form-group">
        <p><label>Done</label></p>
        <div class="row">
            <div class="col-md-12" id="doneList">
                {!! $tasksDone !!}
            </div>
        </div>
    </div>

    {{-- Add task --}}
    <div class="awe-buttons">
        <form class="form-horizontal" role="form" method="POST" action="/tasks/{{ $project->id }}/store">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <div class="col-md-10">
                    <textarea class="form-control" name="description" id="description" rows="5">{{
                        old('description') }}</textarea>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary" title="Add task">
                        Add
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="form-group"><br><br>
        <a class="btn btn-default btn-raised" href="{{ url('/projects' ) }}" title="Back to Projects">
           « Back
        </a>
    </div>
</div>
