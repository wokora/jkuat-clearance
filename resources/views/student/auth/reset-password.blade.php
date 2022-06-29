@extends('layouts.admin.auth')

@section('content')

    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('student.login.index') }}" class="h1">{{ config('app.name') }}</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Enter your email to reset your password.</p>

                @if( session()->has('success') )
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                @if( session()->has('error') )
                    <div class="alert alert-danger">{{ session()->get('error') }}</div>
                @endif

                <form method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mb-3">Send New Password</button>

                </form>

                <p class="mb-1">
                    <a href="{{ route('student.login.index') }}">Login</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

@endsection
