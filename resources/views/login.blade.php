@extends('layouts.auth')


@section('content')

<form class="form-horizontal" method="post" href="{{ url('/login') }}" role="form">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6">
            <div class="form-group required {{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">Username/Email</label>

                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6">
            <div class="form-group required {{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="submit" value="login" class="btn btn-primary btn-raised"/>
            </div>
        </div>
    </div>
</form>
@endsection

@section('title')
    <h1>Login</h1>
@endsection
