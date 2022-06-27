@extends('layouts.admin.main')

@section('title') Manage Administrators @endsection

@section('content')

    <a href="{{ route('admin.user.create') }}" class="btn btn-primary mb-3">Add User</a>

    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col" width="50px">#</th>
            <th scope="col">Name</th>
            <th scope="col">Created</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody class="bg-white">
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $user->surnname.' '.$user->first_name }}</td>
                <td>{{ $user->created_at->format('d F,y') }}</td>
                <td align="right">
                    <a href="{{ route('admin.user.show', [ $user->id ]) }}" class="btn btn-primary"> View </a>
                    <a href="{{ route('admin.user.edit', [ $user->id ]) }}" class="btn btn-primary"> Edit </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>



@endsection
