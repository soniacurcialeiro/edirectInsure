@extends('layouts.layout')


@section('content')
<input type="hidden" name="_token" value="{{ csrf_token() }}">
@if($projects->isEmpty())
    <p>There are no projects</p>
@else
<div id="project">
    <table class="table table-hover dataTable no-footer awe-checkbox-list-items">
        <thead>
            <tr>
                <th style="width: 90%;">
                    Name
                </th>
                <th style="width: 10%;">

                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td>
                    <a href="{{ url('/projects/' . $project->id) }}">{{ $project->name }}</a>
                </td>
                <td>
                    <a href="{{ url('/projects/' . $project->id . '/edit' ) }}" title="Edit Project">
                        <img src="/imgs/edit.png" style="width: 20px"></a>&nbsp;&nbsp;

                    @include('projects.partials._delete_project', [
                        'project' => $project,
                    ])
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif

<div class="awe-buttons">
    <a class="btn btn-primary btn-raised awe-create-btn awe-main-action"
       href="{{ url('/projects/create') }}"
       title="Create Project">
       Create Project
    </a>
</div>
@endsection

@section('title')
    My Projects
@endsection
