@extends('layouts.admin.main')

@section('title') Manage Administrators @endsection

@section('content')

    <a href="{{ route('admin.clearance.create') }}" class="btn btn-primary mb-3"><i class="nav-icon fas fa-plus"></i> New Clearance</a>

    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col" width="50px">#</th>
            <th scope="col">Name</th>
            <th scope="col">Active From</th>
            <th scope="col">Active To</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody class="bg-white">
        @foreach($clearances as $clearance)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $clearance->name }}</td>
                <td>{{ $clearance->active_from }}</td>
                <td>{{ $clearance->active_to }}</td>
                <td align="right">
                    <a href="{{ route('admin.clearance.clearance-section.index', [ $clearance->id ]) }}" class="btn btn-primary"> Sections</a>
                    <a href="{{ route('admin.clearance.user.index', [ $clearance->id ]) }}" class="btn btn-primary"> Users</a>
                    <a href="{{ route('admin.clearance.edit', [ $clearance->id ]) }}" class="btn btn-primary"> Edit </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>



@endsection
