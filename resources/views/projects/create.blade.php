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

    <form class="form-horizontal" role="form" method="POST" action="/projects/store">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @include('projects.partials._form', [
            'project' => $project,
        ])
    </form>

    <div class="form-group"><br><br>
        <a class="btn btn-default btn-raised" href="{{ url('/projects' ) }}" title="Back to Projects">
           « Back
        </a>
    </div>
@endsection

@section('title')
    Projects - Create a new project
@endsection
