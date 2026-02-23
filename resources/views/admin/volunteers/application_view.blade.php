@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h6 class="mb-0 text-uppercase">Volunteer Application Detail</h6>
        <hr/>
        <div class="card">
            <div class="card-body p-4">
                <table class="table table-bordered">
                    <tr>
                        <th width="160">Name</th>
                        <td>{{ $application->name }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $application->phone }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $application->email ?? '—' }}</td>
                    </tr>
                    <tr>
                        <th>Message</th>
                        <td>{{ $application->message ?? '—' }}</td>
                    </tr>
                    <tr>
                        <th>Submitted At</th>
                        <td>{{ \Carbon\Carbon::parse($application->created_at)->format('d M Y, h:i A') }}</td>
                    </tr>
                </table>
                <a href="{{ route('volunteer.applications.index') }}" class="btn btn-secondary mt-2">
                    <i class="bx bx-arrow-back"></i> Back to List
                </a>
                <a href="{{ route('volunteer.applications.delete', $application->id) }}"
                   class="btn btn-danger mt-2"
                   onclick="return confirm('Delete this application?')">
                    <i class="bx bx-trash-alt"></i> Delete
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
