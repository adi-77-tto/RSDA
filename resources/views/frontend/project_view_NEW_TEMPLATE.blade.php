@extends('main')

@section('content')

<!-- Hero/Breadcrumbs -->
<div class="hero-wrap" style="background-image: url('{{ asset('images/project/'.$project->image) }}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-7 ftco-animate text-center">
                <p class="breadcrumbs">
                    <span class="mr-2"><a href="{{ url('/') }}">Home</a></span> 
                    <span class="mr-2"><a href="{{ route('ongoing.project') }}">Ongoing Projects</a></span>
                    <span>{{ Str::limit($project->title, 50) }}</span>
                </p>
                <h1 class="mb-3 bread">Project Details</h1>
            </div>
        </div>
    </div>
</div>

<!-- Project Detail Section  -->
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate">
                <h2 class="mb-3">{{ $project->title }}</h2>
                <p class="meta mb-4">
                    <span class="mr-3"><i class="fas fa-calendar-alt"></i> {{ date("d M, Y") }}</span>
                    @if(!empty($project->donor))
                        <span><i class="fas fa-hands-helping"></i> <strong>Donor:</strong> {{ $project->donor }}</span>
                    @endif
                </p>
                <p>
                    <img src="{{ asset('images/project/'.$project->image) }}" alt="{{ $project->title }}" class="img-fluid mb-4">
                </p>
                <div class="project-content">
                    <p style="text-align:justify; line-height: 1.8;">
                        {{ $project->description }}
                    </p>
                </div>

                <div class="mt-5">
                    <a href="{{ route('ongoing.project') }}" class="btn btn-primary px-4 py-3">
                        <i class="fas fa-arrow-left mr-2"></i> Back to Projects
                    </a>
                    <a href="{{ route('donate') }}" class="btn btn-white px-4 py-3 ml-2">
                        <i class="fas fa-hand-holding-usd mr-2"></i> Support This Project
                    </a>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 sidebar ftco-animate">
                <div class="sidebar-box">
                    <h3 class="heading-sidebar">Get Involved</h3>
                    <div class="block-21 mb-4 d-flex">
                        <div class="text">
                            <h3 class="heading"><a href="{{ route('donate') }}">Make a Donation</a></h3>
                            <p>Support our ongoing projects and help us create sustainable change in communities.</p>
                        </div>
                    </div>
                    <div class="block-21 mb-4 d-flex">
                        <div class="text">
                            <h3 class="heading"><a href="{{ route('volunterr.opportunities') }}">Become a Volunteer</a></h3>
                            <p>Join our team of dedicated volunteers making a difference.</p>
                        </div>
                    </div>
                    <div class="block-21 mb-4 d-flex">
                        <div class="text">
                            <h3 class="heading"><a href="{{ route('partner.donor') }}">Partner With Us</a></h3>
                            <p>Collaborate with RSDA to create lasting impact.</p>
                        </div>
                    </div>
                </div>

                <div class="sidebar-box">
                    <h3 class="heading-sidebar">Contact Information</h3>
                    <div class="block-23 mb-3">
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <span class="fas fa-map-marker-alt mr-2"></span>
                                <span>R.K Road Khalilganj Bazar, Kurigram</span>
                            </li>
                            <li class="mb-3">
                                <span class="fas fa-phone mr-2"></span>
                                <span>01719-691409</span>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}">
                                    <span class="fas fa-envelope mr-2"></span>
                                    <span>Contact Us</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('css')
<style>
    .sidebar-box {
        background: #f8f9fa;
        padding: 30px;
        margin-bottom: 30px;
        border-radius: 4px;
    }
    
    .heading-sidebar {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 20px;
        text-transform: uppercase;
        color: #000;
    }
    
    .block-21 .text h3 {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 10px;
    }
    
    .block-21 .text h3 a {
        color: #000;
    }
    
    .block-21 .text h3 a:hover {
        color: #f86f2d;
    }
    
    .block-21 .text p {
        font-size: 14px;
        color: #666;
        line-height: 1.6;
    }
    
    .block-23 ul li {
        color: #666;
        font-size: 15px;
    }
    
    .meta {
        color: #999;
        font-size: 14px;
    }
    
    .meta span {
        display: inline-block;
    }
</style>
@endpush
