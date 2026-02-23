@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h6 class="mb-0 text-uppercase">Volunteer Detail</h6>
        <hr/>
        <div class="card">
            <div class="card-body p-4">
                <table class="table table-bordered">
                    <tr>
                        <th width="160">Name</th>
                        <td>{{ $item->name }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $item->phone }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $item->email ?? '—' }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $item->description ?? '—' }}</td>
                    </tr>
                    <tr>
                        <th>Submitted At</th>
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y, h:i A') }}</td>
                    </tr>
                </table>
                <a href="{{ route('volunteers.index') }}" class="btn btn-secondary mt-2">
                    <i class="bx bx-arrow-back"></i> Back to List
                </a>
                <a href="{{ route('volunteers.delete', $item->id) }}"
                   class="btn btn-danger mt-2"
                   onclick="return confirm('Delete this record?')">
                    <i class="bx bx-trash-alt"></i> Delete
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
