@extends('layouts.admin.main')

@section('title') Add users to clear @endsection

@section('content')
    <a href="{{ route('admin.user.index') }}" class="btn btn-primary mb-3">All Administrators</a>
    <div class="card">
        <form method="post" action="{{ route('admin.clearance.clearance-section.user.store', [$clearance->id, $clearance_section->id]) }}">
            @csrf
            <div class="card-body">
                <div class="row">
                    @foreach($clearance_users as $clearance_user)
                        <div class="col-3">
                            <div class="custom-control custom-switch custom-control-inline">
                                <input type="checkbox" id="clearance_section_users[{{ $clearance_user->id }}]" value="{{ $clearance_user->id }}" name="clearance_section_users[{{ $clearance_user->id }}]" @if($clearance_section->users->where('user_clearance_id', $clearance_user->id)->count() == 1) checked="checked" @endif class="custom-control-input">
                                <label class="custom-control-label" for="clearance_section_users[{{ $clearance_user->id }}]">{{ $clearance_user->user->surname.' '.$clearance_user->user->first_name }}</label>
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
