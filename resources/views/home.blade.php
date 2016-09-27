@extends('layouts.layout')


@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (!Auth::user())
                Welcome!
            @else
                <div class="form-group">
                    <p>Welcome <u>{{ Auth::user()->name }}</u></p>
                </div>
                <div class="form-group">
                    <p><strong>My Projects:</strong></p>
                    {!! $projects !!}
                </div>
            @endif
        </div>
    </div>
@endsection

@section('title')

@endsection
