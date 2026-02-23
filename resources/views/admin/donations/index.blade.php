@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="mb-1 fw-bold">Donations Management</h4>
                <p class="text-muted mb-0">View and manage all donation transactions</p>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-bottom py-3">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <h6 class="mb-0 fw-semibold">Donations List</h6>
                    <div>
                        <!-- Filter Form -->
                        <form method="GET" action="{{ route('admin.donations.index') }}" class="d-inline-flex gap-2 flex-wrap">
                            <select name="status" class="form-select form-select-sm shadow-sm" style="width: 150px;">
                                <option value="">All Status</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="verified" {{ request('status') == 'verified' ? 'selected' : '' }}>Verified</option>
                                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                            <input type="date" name="date" class="form-control form-control-sm shadow-sm" value="{{ request('date') }}" style="width: 150px;">
                            <button type="submit" class="btn btn-sm btn-primary shadow-sm">
                                <i class="bx bx-filter"></i> Filter
                            </button>
                            <a href="{{ route('admin.donations.index') }}" class="btn btn-sm btn-secondary shadow-sm">
                                <i class="bx bx-reset"></i> Reset
                            </a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show m-3 mb-0">
                        <i class="bx bx-check-circle me-2"></i>{{ session()->get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="px-4 py-3 text-uppercase text-secondary" style="font-size: 11px; font-weight: 600; width: 5%;">SL</th>
                                <th class="px-4 py-3 text-uppercase text-secondary" style="font-size: 11px; font-weight: 600; width: 15%;">Donor Name</th>
                                <th class="px-4 py-3 text-uppercase text-secondary" style="font-size: 11px; font-weight: 600; width: 10%;">Phone</th>
                                <th class="px-4 py-3 text-uppercase text-secondary" style="font-size: 11px; font-weight: 600; width: 12%;">Transaction ID</th>
                                <th class="px-4 py-3 text-uppercase text-secondary" style="font-size: 11px; font-weight: 600; width: 10%;">Amount</th>
                                <th class="px-4 py-3 text-uppercase text-secondary" style="font-size: 11px; font-weight: 600; width: 12%;">Payment Method</th>
                                <th class="px-4 py-3 text-uppercase text-secondary" style="font-size: 11px; font-weight: 600; width: 10%;">Status</th>
                                <th class="px-4 py-3 text-uppercase text-secondary" style="font-size: 11px; font-weight: 600; width: 12%;">Date</th>
                                <th class="px-4 py-3 text-center text-uppercase text-secondary" style="font-size: 11px; font-weight: 600; width: 14%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $key=>$item)
                            <tr class="border-bottom">
                                <td class="px-4 py-3">{{ $data->firstItem() + $key }}</td>
                                <td class="px-4 py-3"><strong>{{ $item->donor_name }}</strong></td>
                                <td class="px-4 py-3 text-muted">{{ $item->donor_phone }}</td>
                                <td class="px-4 py-3"><code class="bg-light px-2 py-1 rounded">{{ $item->transaction_id }}</code></td>
                                <td class="px-4 py-3"><strong class="text-success">৳ {{ number_format($item->amount, 2) }}</strong></td>
                                <td class="px-4 py-3">
                                    <span class="badge bg-info bg-opacity-10 text-info border border-info">{{ ucfirst($item->payment_method ?? 'N/A') }}</span>
                                </td>
                                <td class="px-4 py-3">
                                    @if($item->status == 'pending')
                                        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning">Pending</span>
                                    @elseif($item->status == 'verified')
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success">Verified</span>
                                    @else
                                        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger">Rejected</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3"><small class="text-muted">{{ $item->created_at->format('d M Y') }}<br>{{ $item->created_at->format('h:i A') }}</small></td>
                                <td class="px-4 py-3 text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <a href="{{ route('admin.donations.show', $item->id) }}" 
                                           class="btn btn-sm btn-outline-info" 
                                           title="View Details"
                                           style="padding: 0.25rem 0.5rem;">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        @if($item->status == 'pending')
                                        <form action="{{ route('admin.donations.verify', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-success" 
                                                    onclick="return confirm('Verify this donation?')"
                                                    title="Verify"
                                                    style="padding: 0.25rem 0.5rem;">
                                                <i class="bx bx-check"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.donations.reject', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-warning" 
                                                    onclick="return confirm('Reject this donation?')"
                                                    title="Reject"
                                                    style="padding: 0.25rem 0.5rem;">
                                                <i class="bx bx-x"></i>
                                            </button>
                                        </form>
                                        @endif
                                        <a href="{{ route('admin.donations.delete', $item->id) }}" 
                                           class="btn btn-sm btn-outline-danger" 
                                           onclick="return confirm('Are you sure you want to delete this donation?')"
                                           title="Delete"
                                           style="padding: 0.25rem 0.5rem;">
                                            <i class="bx bx-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="bx bx-info-circle bx-lg d-block mb-2 text-secondary"></i>
                                        <p class="mb-0">No donations found.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($data->count() > 0)
                    <!-- Pagination & Summary -->
                    <div class="d-flex justify-content-between align-items-center p-3 border-top">
                        <div class="text-muted">
                            <small>
                                Showing <strong>{{ $data->firstItem() }}</strong> to <strong>{{ $data->lastItem() }}</strong> of <strong>{{ $data->total() }}</strong> donations
                            </small>
                        </div>
                        <div>
                            {{ $data->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
