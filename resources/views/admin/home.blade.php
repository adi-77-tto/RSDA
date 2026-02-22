@extends('layouts.admin')

@section('content')

{{-- Stats Cards Row --}}
<div class="row g-3 mb-4">
    {{-- Total Projects --}}
    <div class="col-xl-3 col-md-6">
        <div class="card shadow-sm border-0 overflow-hidden h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <p class="mb-0 text-uppercase text-secondary fw-bold" style="font-size: 11px;">Total Projects</p>
                        <h3 class="mb-0 fw-bold text-dark mt-1">{{ $totalProjects }}</h3>
                        <p class="mb-0 text-success mt-2" style="font-size: 12px;">
                            <i class='bx bx-up-arrow-alt'></i> Active
                        </p>
                    </div>
                    <div class="ms-3">
                        <div class="d-flex align-items-center justify-content-center rounded-circle bg-gradient-primary text-white shadow" style="width: 55px; height: 55px;">
                            <i class='bx bx-briefcase-alt' style="font-size: 26px;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Total Donations --}}
    <div class="col-xl-3 col-md-6">
        <div class="card shadow-sm border-0 overflow-hidden h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <p class="mb-0 text-uppercase text-secondary fw-bold" style="font-size: 11px;">Total Donations</p>
                        <h3 class="mb-0 fw-bold text-dark mt-1">৳ {{ number_format($totalDonations, 2) }}</h3>
                        <p class="mb-0 text-info mt-2" style="font-size: 12px;">
                            <i class='bx bx-trending-up'></i> {{ $pendingDonations }} Pending
                        </p>
                    </div>
                    <div class="ms-3">
                        <div class="d-flex align-items-center justify-content-center rounded-circle bg-gradient-success text-white shadow" style="width: 55px; height: 55px;">
                            <i class='bx bx-donate-heart' style="font-size: 26px;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Volunteers --}}
    <div class="col-xl-3 col-md-6">
        <div class="card shadow-sm border-0 overflow-hidden h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <p class="mb-0 text-uppercase text-secondary fw-bold" style="font-size: 11px;">Volunteers</p>
                        <h3 class="mb-0 fw-bold text-dark mt-1">{{ $totalVolunteers }}</h3>
                        <p class="mb-0 text-warning mt-2" style="font-size: 12px;">
                            <i class='bx bx-heart'></i> Opportunities
                        </p>
                    </div>
                    <div class="ms-3">
                        <div class="d-flex align-items-center justify-content-center rounded-circle bg-gradient-warning text-white shadow" style="width: 55px; height: 55px;">
                            <i class='bx bx-group' style="font-size: 26px;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Messages --}}
    <div class="col-xl-3 col-md-6">
        <div class="card shadow-sm border-0 overflow-hidden h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <p class="mb-0 text-uppercase text-secondary fw-bold" style="font-size: 11px;">New Messages</p>
                        <h3 class="mb-0 fw-bold text-dark mt-1">{{ $newMessages }}</h3>
                        <p class="mb-0 text-danger mt-2" style="font-size: 12px;">
                            <i class='bx bx-message-detail'></i> Total
                        </p>
                    </div>
                    <div class="ms-3">
                        <div class="d-flex align-items-center justify-content-center rounded-circle bg-gradient-danger text-white shadow" style="width: 55px; height: 55px;">
                            <i class='bx bx-message-rounded-dots' style="font-size: 26px;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Main Content Row --}}
<div class="row g-3">
    {{-- Welcome Card --}}
    <div class="col-xl-8">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-3">
                    <div>
                        <h4 class="mb-1 fw-bold">Welcome to RSDA Admin Dashboard</h4>
                        <p class="mb-0 text-muted">Manage your NGO operations efficiently</p>
                    </div>
                </div>
                <hr class="my-3">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="p-3 bg-light rounded">
                            <div class="d-flex align-items-center">
                                <i class='bx bx-trending-up bx-md text-success me-2'></i>
                                <div>
                                    <small class="text-muted d-block">Impact Metrics</small>
                                    <strong>{{ $totalImpact }} Records</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="p-3 bg-light rounded">
                            <div class="d-flex align-items-center">
                                <i class='bx bx-book-heart bx-md text-info me-2'></i>
                                <div>
                                    <small class="text-muted d-block">Success Stories</small>
                                    <strong>{{ $totalStories }} Stories</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="p-3 bg-light rounded">
                            <div class="d-flex align-items-center">
                                <i class='bx bx-user-check bx-md text-primary me-2'></i>
                                <div>
                                    <small class="text-muted d-block">Partners</small>
                                    <strong>{{ $totalPartners }} Partners</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Actions Card --}}
    <div class="col-xl-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white border-bottom">
                <h5 class="mb-0 fw-bold">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('strategic_plans.create') }}" class="btn btn-primary btn-sm d-flex align-items-center">
                        <i class="bx bx-plus me-2"></i> Add Strategic Plan
                    </a>
                    <a href="{{ route('project.add') }}" class="btn btn-success btn-sm d-flex align-items-center">
                        <i class="bx bx-plus me-2"></i> Add Project
                    </a>
                    <a href="{{ route('news.add') }}" class="btn btn-info btn-sm d-flex align-items-center">
                        <i class="bx bx-plus me-2"></i> Add News
                    </a>
                    <a href="{{ route('admin.donations.index') }}" class="btn btn-outline-primary btn-sm d-flex align-items-center">
                        <i class="bx bx-list-ul me-2"></i> View All Donations
                    </a>
                    <a href="{{ route('message.index') }}" class="btn btn-outline-secondary btn-sm d-flex align-items-center">
                        <i class="bx bx-message me-2"></i> View Messages
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
