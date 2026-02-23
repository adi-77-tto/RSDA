@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">Volunteer Applications</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $key => $item)
                            <tr>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle">{{ $item->name }}</td>
                                <td class="align-middle">{{ $item->phone }}</td>
                                <td class="align-middle">{{ $item->email ?? '—' }}</td>
                                <td class="align-middle" style="max-width:250px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                                    {{ $item->message ?? '—' }}
                                </td>
                                <td class="align-middle">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('volunteer.applications.view', $item->id) }}" class="btn btn-sm btn-info text-white">
                                        <i class="bx bx-show"></i>
                                    </a>
                                    <a href="{{ route('volunteer.applications.delete', $item->id) }}"
                                       class="btn btn-sm btn-danger text-white"
                                       onclick="return confirm('Delete this application?')">
                                        <i class="bx bx-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">No volunteer applications yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
