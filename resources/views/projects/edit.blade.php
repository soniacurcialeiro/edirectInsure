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

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/projects/' . $project->id) }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        {{ method_field('PATCH') }}

        @include('projects.partials._form', [
            'project' => $project,
        ])
    </form>

    <div class="form-group"><br><br>
        <a class="btn btn-default btn-raised" href="{{ url('/projects/' . $project->id) }}" title="Back to Project">
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
                {{ $project->name }}
            </div>
            <div class="col-md-4">
                <div class="pull-right">
                    <a href="{{ url('/projects/' . $project->id . '/delete' ) }}" title="Delete Project">
                        <img src="/imgs/trash.png" style="width: 20px"></a>
                </div>
            </div>
        </div>
    </div>
@endsection
