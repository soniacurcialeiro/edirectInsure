@extends('layouts.layout')

@section('content')
    @include('projects.partials._show', [
        'project' => $project,
    ])

@endsection

@section('title')
@endsection

@section('header')
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-8">
                {{ $project->name }}
            </div>
            <div class="col-md-4">
                <div class="pull-right">
                    <a href="{{ url('/projects/' . $project->id . '/edit' ) }}" title="Edit Project">
                        <img src="/imgs/edit.png" style="width: 20px"></a>&nbsp;&nbsp;
                    <a href="{{ url('/projects/' . $project->id . '/delete' ) }}" title="Delete Project">
                        <img src="/imgs/trash.png" style="width: 20px"></a>
                </div>
            </div>
        </div>
    </div>
@endsection
