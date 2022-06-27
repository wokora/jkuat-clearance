@extends('layouts.admin.main')

@section('title') Create Administrators @endsection

@section('content')
    <a href="{{ route('admin.clearance.index') }}" class="btn btn-primary mb-3">All</a>
    <div class="row">
        <div class="col-5">
            <div class="card">
                <form method="post" action="{{ route('admin.clearance.update', $clearance->id) }}">
                    @csrf @method('patch')
                    <div class="card-body">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $clearance->name) }}" placeholder="Enter Clearance Form Name">
                            @error('name') <div class="invalid-feedback">{{ $message }} </div>@endif
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Active From</label>
                                    <input type="date" name="active_from" id="active_from" class="form-control @error('active_from') is-invalid @enderror" value="{{ old('active_from', $clearance->active_from) }}" placeholder="Active From">
                                    @error('active_from')<div class="invalid-feedback">{{ $message }}</div>@endif
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Active To</label>
                                    <input type="date" name="active_to" id="active_to" class="form-control @error('active_to') is-invalid @enderror" value="{{ old('active_to', $clearance->active_to) }}" placeholder="Active To">
                                    @error('active_to')<div class="invalid-feedback">{{ $message }}</div>@endif
                                </div>
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
