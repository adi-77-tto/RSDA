@extends('layouts.admin')

@section('content')

{{-- ══════════════════════════════════════════════════════
     STAT CARDS ROW
══════════════════════════════════════════════════════ --}}
<div class="row g-3 mb-4">

    {{-- Total Projects --}}
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #0d6efd !important;">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <p class="mb-0 text-uppercase fw-bold text-secondary" style="font-size:11px;">Total Projects</p>
                    <h3 class="mb-0 fw-bold text-dark">{{ $totalProjects }}</h3>
                    <small class="text-success"><i class='bx bx-check-circle'></i> Ongoing</small>
                </div>
                <div class="rounded-circle d-flex align-items-center justify-content-center text-white shadow"
                     style="width:55px;height:55px;background:linear-gradient(135deg,#0d6efd,#6610f2);">
                    <i class='bx bx-briefcase-alt' style="font-size:26px;"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Verified Donations --}}
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #198754 !important;">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <p class="mb-0 text-uppercase fw-bold text-secondary" style="font-size:11px;">Verified Donations</p>
                    <h3 class="mb-0 fw-bold text-dark">৳ {{ number_format($totalDonations, 0) }}</h3>
                    <small class="text-warning"><i class='bx bx-time'></i> {{ $pendingDonations }} pending</small>
                </div>
                <div class="rounded-circle d-flex align-items-center justify-content-center text-white shadow"
                     style="width:55px;height:55px;background:linear-gradient(135deg,#198754,#20c997);">
                    <i class='bx bx-donate-heart' style="font-size:26px;"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Volunteers --}}
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #ffc107 !important;">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <p class="mb-0 text-uppercase fw-bold text-secondary" style="font-size:11px;">Volunteers</p>
                    <h3 class="mb-0 fw-bold text-dark">{{ $totalVolunteers }}</h3>
                    <small class="text-info"><i class='bx bx-heart'></i> Sign-ups</small>
                </div>
                <div class="rounded-circle d-flex align-items-center justify-content-center text-white shadow"
                     style="width:55px;height:55px;background:linear-gradient(135deg,#ffc107,#fd7e14);">
                    <i class='bx bx-group' style="font-size:26px;"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Messages --}}
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #dc3545 !important;">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <p class="mb-0 text-uppercase fw-bold text-secondary" style="font-size:11px;">Total Messages</p>
                    <h3 class="mb-0 fw-bold text-dark">{{ $newMessages }}</h3>
                    <small class="text-danger"><i class='bx bx-message-detail'></i> Inbox</small>
                </div>
                <div class="rounded-circle d-flex align-items-center justify-content-center text-white shadow"
                     style="width:55px;height:55px;background:linear-gradient(135deg,#dc3545,#e83e8c);">
                    <i class='bx bx-message-rounded-dots' style="font-size:26px;"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- News --}}
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #0dcaf0 !important;">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <p class="mb-0 text-uppercase fw-bold text-secondary" style="font-size:11px;">News Articles</p>
                    <h3 class="mb-0 fw-bold text-dark">{{ $totalNews }}</h3>
                    <small class="text-info"><i class='bx bx-news'></i> Published</small>
                </div>
                <div class="rounded-circle d-flex align-items-center justify-content-center text-white shadow"
                     style="width:55px;height:55px;background:linear-gradient(135deg,#0dcaf0,#0d6efd);">
                    <i class='bx bx-news' style="font-size:26px;"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Programs --}}
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #6f42c1 !important;">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <p class="mb-0 text-uppercase fw-bold text-secondary" style="font-size:11px;">Programs</p>
                    <h3 class="mb-0 fw-bold text-dark">{{ $totalPrograms }}</h3>
                    <small class="text-primary"><i class='bx bx-list-check'></i> Active</small>
                </div>
                <div class="rounded-circle d-flex align-items-center justify-content-center text-white shadow"
                     style="width:55px;height:55px;background:linear-gradient(135deg,#6f42c1,#e83e8c);">
                    <i class='bx bx-list-check' style="font-size:26px;"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Stories --}}
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #20c997 !important;">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <p class="mb-0 text-uppercase fw-bold text-secondary" style="font-size:11px;">Success Stories</p>
                    <h3 class="mb-0 fw-bold text-dark">{{ $totalStories }}</h3>
                    <small class="text-success"><i class='bx bx-book-heart'></i> Stories</small>
                </div>
                <div class="rounded-circle d-flex align-items-center justify-content-center text-white shadow"
                     style="width:55px;height:55px;background:linear-gradient(135deg,#20c997,#0dcaf0);">
                    <i class='bx bx-book-heart' style="font-size:26px;"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Partners --}}
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #fd7e14 !important;">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <p class="mb-0 text-uppercase fw-bold text-secondary" style="font-size:11px;">Partners</p>
                    <h3 class="mb-0 fw-bold text-dark">{{ $totalPartners }}</h3>
                    <small class="text-warning"><i class='bx bx-user-check'></i> Active</small>
                </div>
                <div class="rounded-circle d-flex align-items-center justify-content-center text-white shadow"
                     style="width:55px;height:55px;background:linear-gradient(135deg,#fd7e14,#ffc107);">
                    <i class='bx bx-user-check' style="font-size:26px;"></i>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- ══════════════════════════════════════════════════════
     ROW 2 — Monthly Donations Bar  +  Donation Status Doughnut
══════════════════════════════════════════════════════ --}}
<div class="row g-3 mb-4">

    {{-- Monthly Donations Bar Chart --}}
    <div class="col-xl-8">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
                <div>
                    <h5 class="mb-0 fw-bold"><i class='bx bx-bar-chart-alt-2 text-primary me-1'></i> Monthly Donations (Last 6 Months)</h5>
                    <small class="text-muted">Verified vs Pending amounts (BDT)</small>
                </div>
            </div>
            <div class="card-body">
                <canvas id="monthlyDonationsChart" height="110"></canvas>
            </div>
        </div>
    </div>

    {{-- Donation Status Doughnut --}}
    <div class="col-xl-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-bottom py-3">
                <h5 class="mb-0 fw-bold"><i class='bx bx-pie-chart-alt-2 text-success me-1'></i> Donation Status</h5>
                <small class="text-muted">Breakdown by status</small>
            </div>
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <canvas id="donationStatusChart" height="220"></canvas>
                <div class="mt-3 w-100">
                    <div class="d-flex justify-content-around text-center">
                        <div>
                            <span class="badge rounded-pill" style="background:#198754;">Verified</span>
                            <div class="fw-bold mt-1">{{ $donationVerified }}</div>
                        </div>
                        <div>
                            <span class="badge rounded-pill" style="background:#ffc107;color:#333;">Pending</span>
                            <div class="fw-bold mt-1">{{ $donationPending }}</div>
                        </div>
                        <div>
                            <span class="badge rounded-pill" style="background:#dc3545;">Rejected</span>
                            <div class="fw-bold mt-1">{{ $donationRejected }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- ══════════════════════════════════════════════════════
     ROW 3 — Content Overview Horizontal Bar  +  Volunteer Line Chart
══════════════════════════════════════════════════════ --}}
<div class="row g-3 mb-4">

    {{-- Content Overview Horizontal Bar --}}
    <div class="col-xl-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-bottom py-3">
                <h5 class="mb-0 fw-bold"><i class='bx bx-bar-chart text-info me-1'></i> Content Overview</h5>
                <small class="text-muted">Total records across all content types</small>
            </div>
            <div class="card-body">
                <canvas id="contentOverviewChart" height="220"></canvas>
            </div>
        </div>
    </div>

    {{-- Volunteer Sign-ups Line Chart --}}
    <div class="col-xl-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-bottom py-3">
                <h5 class="mb-0 fw-bold"><i class='bx bx-line-chart text-warning me-1'></i> Volunteer Sign-ups (Last 6 Months)</h5>
                <small class="text-muted">Monthly trend</small>
            </div>
            <div class="card-body">
                <canvas id="volunteerChart" height="220"></canvas>
            </div>
        </div>
    </div>

</div>

{{-- ══════════════════════════════════════════════════════
     ROW 4 — Summary Pie  +  Quick Actions
══════════════════════════════════════════════════════ --}}
<div class="row g-3 mb-4">

    {{-- Site-wide Content Pie --}}
    <div class="col-xl-5">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-bottom py-3">
                <h5 class="mb-0 fw-bold"><i class='bx bx-doughnut-chart text-primary me-1'></i> Site Content Distribution</h5>
                <small class="text-muted">Share of each content type</small>
            </div>
            <div class="card-body d-flex align-items-center justify-content-center">
                <canvas id="contentPieChart" height="260" style="max-width:320px;"></canvas>
            </div>
        </div>
    </div>

    {{-- Quick Actions + Summary --}}
    <div class="col-xl-7">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-bottom py-3">
                <h5 class="mb-0 fw-bold"><i class='bx bx-grid-alt text-secondary me-1'></i> Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="row g-2 mb-3">
                    <div class="col-6">
                        <a href="{{ route('project.add') }}" class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center gap-2 py-2">
                            <i class='bx bx-plus-circle'></i> Add Project
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('news.add') }}" class="btn btn-outline-info w-100 d-flex align-items-center justify-content-center gap-2 py-2">
                            <i class='bx bx-plus-circle'></i> Add News
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('stories.add') }}" class="btn btn-outline-success w-100 d-flex align-items-center justify-content-center gap-2 py-2">
                            <i class='bx bx-plus-circle'></i> Add Story
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('strategic_plans.create') }}" class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center gap-2 py-2">
                            <i class='bx bx-plus-circle'></i> Strategic Plan
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('admin.donations.index') }}" class="btn btn-outline-warning w-100 d-flex align-items-center justify-content-center gap-2 py-2">
                            <i class='bx bx-list-ul'></i> Donations
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('message.index') }}" class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center gap-2 py-2">
                            <i class='bx bx-message'></i> Messages
                        </a>
                    </div>
                </div>
                <hr class="my-2">
                <div class="row text-center g-2">
                    <div class="col-4">
                        <div class="bg-light rounded p-2">
                            <div class="fw-bold fs-5 text-primary">{{ $totalImpact }}</div>
                            <small class="text-muted">Impact Metrics</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="bg-light rounded p-2">
                            <div class="fw-bold fs-5 text-success">{{ $totalStories }}</div>
                            <small class="text-muted">Stories</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="bg-light rounded p-2">
                            <div class="fw-bold fs-5 text-warning">{{ $totalPartners }}</div>
                            <small class="text-muted">Partners</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')
{{-- Chart.js CDN --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
<script>
// ── Shared Defaults ──────────────────────────────────────────────
Chart.defaults.font.family = "'Roboto', sans-serif";
Chart.defaults.color = '#6c757d';

// ── 1. Monthly Donations Bar Chart ──────────────────────────────
(function(){
    const ctx = document.getElementById('monthlyDonationsChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($monthLabels) !!},
            datasets: [
                {
                    label: 'Verified (৳)',
                    data: {!! json_encode($verifiedArr) !!},
                    backgroundColor: 'rgba(25, 135, 84, 0.80)',
                    borderRadius: 6,
                    borderSkipped: false,
                },
                {
                    label: 'Pending (৳)',
                    data: {!! json_encode($pendingArr) !!},
                    backgroundColor: 'rgba(255, 193, 7, 0.80)',
                    borderRadius: 6,
                    borderSkipped: false,
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                tooltip: {
                    callbacks: {
                        label: ctx => ' ৳ ' + Number(ctx.parsed.y).toLocaleString()
                    }
                }
            },
            scales: {
                x: { grid: { display: false } },
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: v => '৳ ' + Number(v).toLocaleString()
                    }
                }
            }
        }
    });
})();

// ── 2. Donation Status Doughnut ──────────────────────────────────
(function(){
    const ctx = document.getElementById('donationStatusChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Verified', 'Pending', 'Rejected'],
            datasets: [{
                data: [{{ $donationVerified }}, {{ $donationPending }}, {{ $donationRejected }}],
                backgroundColor: ['#198754', '#ffc107', '#dc3545'],
                hoverOffset: 10,
                borderWidth: 2,
            }]
        },
        options: {
            cutout: '65%',
            plugins: {
                legend: { display: false },
                tooltip: { callbacks: { label: ctx => ' ' + ctx.label + ': ' + ctx.parsed } }
            }
        }
    });
})();

// ── 3. Content Overview Horizontal Bar ──────────────────────────
(function(){
    const ctx = document.getElementById('contentOverviewChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($contentLabels) !!},
            datasets: [{
                label: 'Total Records',
                data: {!! json_encode($contentCounts) !!},
                backgroundColor: [
                    'rgba(13, 110, 253, 0.80)',
                    'rgba(13, 202, 240, 0.80)',
                    'rgba(111, 66, 193, 0.80)',
                    'rgba(32, 201, 151, 0.80)',
                    'rgba(255, 193, 7, 0.80)',
                    'rgba(253, 126, 20, 0.80)',
                    'rgba(220, 53, 69, 0.80)',
                    'rgba(25, 135, 84, 0.80)',
                ],
                borderRadius: 5,
                borderSkipped: false,
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                x: { beginAtZero: true, ticks: { stepSize: 1 } },
                y: { grid: { display: false } }
            }
        }
    });
})();

// ── 4. Volunteer Sign-ups Line Chart ────────────────────────────
(function(){
    const ctx = document.getElementById('volunteerChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($monthLabels) !!},
            datasets: [{
                label: 'Volunteer Sign-ups',
                data: {!! json_encode($volunteerArr) !!},
                borderColor: '#fd7e14',
                backgroundColor: 'rgba(253, 126, 20, 0.15)',
                borderWidth: 3,
                pointBackgroundColor: '#fd7e14',
                pointRadius: 5,
                tension: 0.4,
                fill: true,
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                x: { grid: { display: false } },
                y: { beginAtZero: true, ticks: { stepSize: 1 } }
            }
        }
    });
})();

// ── 5. Site Content Pie Chart ────────────────────────────────────
(function(){
    const ctx = document.getElementById('contentPieChart').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($contentLabels) !!},
            datasets: [{
                data: {!! json_encode($contentCounts) !!},
                backgroundColor: [
                    '#0d6efd','#0dcaf0','#6f42c1','#20c997',
                    '#ffc107','#fd7e14','#dc3545','#198754'
                ],
                hoverOffset: 8,
                borderWidth: 2,
            }]
        },
        options: {
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { boxWidth: 14, padding: 12 }
                }
            }
        }
    });
})();
</script>
@endpush
