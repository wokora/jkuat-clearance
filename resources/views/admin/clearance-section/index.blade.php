@extends('layouts.admin.main')

@section('title') Manage Administrators @endsection

@section('content')

    <a href="{{ route('admin.clearance.clearance-section.create',$clearance->id) }}" class="btn btn-primary mb-3">Add Section</a>

    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col" width="50px">#</th>
            <th scope="col">Name</th>
            <th scope="col">Order</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody class="bg-white">
        @foreach($clearance->sections as $section)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $section->name }}</td>
                <td>{{ $section->order }}</td>
                <td align="right">
                    <a href="{{ route('admin.clearance.clearance-section.show', [ $clearance->id, $section->id ]) }}" class="btn btn-primary"> Show </a>
                    <a href="{{ route('admin.clearance.clearance-section.user.index', [ $clearance->id, $section->id ]) }}" class="btn btn-primary"> Users</a>
                    <a href="{{ route('admin.clearance.clearance-section.edit', [ $clearance->id, $section->id ]) }}" class="btn btn-primary"> Edit </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>



@endsection
