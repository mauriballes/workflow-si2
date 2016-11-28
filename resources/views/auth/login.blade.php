{{--<!-- resources/views/auth/login.blade.php -->--}}

{{--<form method="POST" action="/auth/login">--}}
    {{--{!! csrf_field() !!}--}}

    {{--<div>--}}
        {{--Email--}}
        {{--<input type="email" name="email" value="{{ old('email') }}">--}}
    {{--</div>--}}

    {{--<div>--}}
        {{--Password--}}
        {{--<input type="password" name="password" id="password">--}}
    {{--</div>--}}

    {{--<div>--}}
        {{--<input type="checkbox" name="remember"> Remember Me--}}
    {{--</div>--}}

    {{--<div>--}}
        {{--<button type="submit">Login</button>--}}
    {{--</div>--}}
{{--</form>--}}

@extends('layout.principal')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Sign in to continue to Bootsnipp</h1>
            <div class="account-wall">
                <form method="POST" action="/auth/login" class="form-signin">
                    {!! csrf_field() !!}
                    <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                        Sign in</button>
                    <label class="checkbox pull-left">
                        <input type="checkbox" value="remember">
                        Remember me
                    </label>
                    <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                </form>
            </div>
            <a href="#" class="text-center new-account">Create an account </a>
        </div>
    </div>
</div>
    @endsection