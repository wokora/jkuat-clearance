@extends('layouts.admin.auth')

@section('content')

    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('student.login.index') }}" class="h1">{{ config('app.name') }}</a>
            </div>
            <div class="card-body">

                <p class="login-box-msg">Sign in to start start Clearance</p>

                @if( session()->has('success') )
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                @if( session()->has('error') )
                    <div class="alert alert-danger">{{ session()->get('error') }}</div>
                @endif

                <form method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="email" class="form-control" placeholder="Email / Registration Number">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">Remember Me</label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-1">
                    <a href="{{ route('student.reset-password.index') }}">I forgot my password</a>
                </p>

                <p class="mb-3">
                    <a href="{{ route('student.register.index') }}">Create Account</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

@endsection
