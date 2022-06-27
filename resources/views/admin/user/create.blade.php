@extends('layouts.admin.main')

@section('title') Create Administrators @endsection

@section('content')
    <a href="{{ route('admin.user.index') }}" class="btn btn-primary mb-3">All Administrators</a>
    <div class="row">
        <div class="col-5">
            <div class="card">
                <form method="post" action="{{ route('admin.user.store') }}">
                    @csrf
                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Surname</label>
                                    <input type="text" name="surname" id="surname" class="form-control @error('surname') is-invalid @enderror" placeholder="Surname">
                                    @error('surname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name">
                                    @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Admin Email">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" name="email_password" @if( old('email_password', true) == true ) checked="true" @endif id="email_password">
                                <label class="custom-control-label" for="email_password">Email Password</label>
                            </div>
                        </div>


                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
