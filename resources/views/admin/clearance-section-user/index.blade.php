@extends('layouts.admin.main')

@section('title') Add users to clear @endsection

@section('content')
    <a href="{{ route('admin.user.index') }}" class="btn btn-primary mb-3">All Administrators</a>
    <div class="card">
        <form method="post" action="{{ route('admin.clearance.user.store', $clearance->id) }}">
            @csrf
            <div class="card-body">
                <div class="row">
                    @foreach($users as $user)
                        <div class="col-3">
                            <div class="custom-control custom-switch custom-control-inline">
                                <input type="checkbox" id="clearance_users[{{ $user->id }}]" value="{{ $user->id }}" name="clearance_users[{{ $user->id }}]" @if($clearance->users->where('user_id', $user->id)->count() == 1) checked="checked" @endif class="custom-control-input">
                                <label class="custom-control-label" for="clearance_users[{{ $user->id }}]">{{ $user->surname.' '.$user->first_name }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Save Users</button>
            </div>
        </form>
    </div>

@endsection
