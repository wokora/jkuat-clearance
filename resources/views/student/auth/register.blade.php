@extends('layouts.admin.auth')

@section('content')

    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('student.login.index') }}" class="h1">{{ config('app.name') }}</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Create an Account</p>

                @if( session()->has('success') )
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                @if( session()->has('error') )
                    <div class="alert alert-danger">{{ session()->get('error') }}</div>
                @endif

                <form method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" name="surname" class="form-control @error('surname') is-invalid @enderror" placeholder="Surname">
                                @error('surname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name">
                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="text" name="registration_number" class="form-control @error('registration_number') is-invalid @enderror" placeholder="Registration Number">
                        @error('registration_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">I Agree to Terms</label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="my-3">
                    <a href="{{ route('student.login.index') }}">Login</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

@endsection
