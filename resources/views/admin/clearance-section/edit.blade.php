@extends('layouts.admin.main')

@section('title') Create {{ $clearance->name }} Section @endsection

@section('content')
    <a href="{{ route('admin.user.index') }}" class="btn btn-primary mb-3">All Administrators</a>
    <div class="row">
        <div class="col-5">
            <div class="card">
                <form method="post" action="{{ route('admin.clearance.clearance-section.update',[$clearance->id, $clearance_section->id]) }}">
                    @csrf @method('patch')
                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" id="name" value="{{ old('name', $clearance_section->name) }}" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @endif
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Order</label>
                                    <input type="number" name="order" id="order" value="{{ old('order', $clearance_section->order) }}" class="form-control @error('order') is-invalid @enderror" placeholder="Order">
                                    @error('order') <div class="invalid-feedback">{{ $message }}</div> @endif
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" name="follow_order" @if( old('follow_order', $clearance_section->follows_order) ) checked="true" @endif id="follow_order">
                                <label class="custom-control-label" for="email_password">Follow Order</label>
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
