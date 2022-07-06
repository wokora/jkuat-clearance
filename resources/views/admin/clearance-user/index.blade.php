@extends('layouts.admin.main')

@section('title') Add users to clear @endsection

@section('content')
    <a href="{{ route('admin.user.index') }}" class="btn btn-primary mb-3">All Administrators</a>
    <div class="card">
        <form method="post" action="{{ route('admin.clearance.user.store', $clearance->id) }}">
            @csrf
            <div class="card-body">

                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" width="50px">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Add to Section </th>
                            <th scope="col"></th>
                        </tr>
                         </thead>
                        <tbody class="bg-white">
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $user->surnname.' '.$user->first_name }}</td>
                                <td>
                                    <input class="custom-control custom-switch custom-control-inline" type="checkbox" id="clearance_users[{{ $user->id }}]" value="{{ $user->id }}" name="clearance_users[{{ $user->id }}]" @if($clearance->users->where('user_id', $user->id)->count() == 1) checked="checked" @endif class="custom-control-input">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Save Users</button>
            </div>
        </form>
    </div>

@endsection
