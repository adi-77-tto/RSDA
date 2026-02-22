@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="mb-1 fw-bold">Strategic Plans</h4>
                <p class="text-muted mb-0">Manage all strategic plans and documents</p>
            </div>
            <a href="{{ route('strategic_plans.create') }}" class="btn btn-primary shadow-sm">
                <i class="bx bx-plus"></i> Add Strategic Plan
            </a>
        </div>

        <div class="card shadow-sm border-0">
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
                                <th class="px-4 py-3 text-uppercase text-secondary" style="font-size: 11px; font-weight: 600;">SL.</th>
                                <th class="px-4 py-3 text-uppercase text-secondary" style="font-size: 11px; font-weight: 600;">Image</th>
                                <th class="px-4 py-3 text-uppercase text-secondary" style="font-size: 11px; font-weight: 600;">Title</th>
                                <th class="px-4 py-3 text-uppercase text-secondary" style="font-size: 11px; font-weight: 600;">Description</th>
                                <th class="px-4 py-3 text-uppercase text-secondary" style="font-size: 11px; font-weight: 600;">Created Date</th>
                                <th class="px-4 py-3 text-center text-uppercase text-secondary" style="font-size: 11px; font-weight: 600;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($strategicPlans as $key => $strategicPlan)
                                <tr class="border-bottom">
                                    <td class="px-4 py-3">{{ ++$key }}</td>
                                    <td class="px-4 py-3">
                                        @if (!empty($strategicPlan->image))
                                            <img src="{{ asset('images/strategic_plans/images/'.$strategicPlan->image) }}" 
                                                 alt="{{ $strategicPlan->title }}" 
                                                 width="60" 
                                                 height="45" 
                                                 class="rounded shadow-sm"
                                                 style="object-fit: cover;">
                                        @else
                                            <div class="d-flex align-items-center justify-content-center bg-light rounded" style="width: 60px; height: 45px;">
                                                <i class="bx bx-image text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">
                                        <a href="{{ asset('images/strategic_plans/pdfs/'.$strategicPlan->pdf_file) }}" 
                                           target="_blank" 
                                           download 
                                           class="text-decoration-none text-dark fw-semibold">
                                            {{ $strategicPlan->title }}
                                            <i class="bx bx-download ms-1 text-primary"></i>
                                        </a>
                                    </td>
                                    <td class="px-4 py-3 text-muted">{{ Str::limit($strategicPlan->description, 50, '...') }}</td>
                                    <td class="px-4 py-3">
                                        <small class="text-muted">{{ date('M d, Y', strtotime($strategicPlan->created_at)) }}</small>
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <div class="d-flex align-items-center justify-content-center gap-1">
                                            <a href="{{ route('strategic_plans.edit', $strategicPlan->id) }}" 
                                               class="btn btn-sm btn-outline-primary" 
                                               title="Edit"
                                               style="padding: 0.25rem 0.5rem;">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                            <a href="{{ route('strategic_plans.delete', $strategicPlan->id) }}" 
                                               class="btn btn-sm btn-outline-danger" 
                                               title="Delete"
                                               style="padding: 0.25rem 0.5rem;"
                                               onclick="return confirm('Are you sure you want to delete this strategic plan?')">
                                                <i class="bx bx-trash-alt"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="bx bx-file bx-lg d-block mb-2 text-secondary"></i>
                                            <p class="mb-2">No strategic plans found</p>
                                            <a href="{{ route('strategic_plans.create') }}" class="btn btn-sm btn-primary">
                                                <i class="bx bx-plus"></i> Add the first one
                                            </a>
                                        </div>
                                    </td>
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
