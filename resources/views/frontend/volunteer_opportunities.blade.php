@extends('main')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Get Involved</li>
      </ol>
      <h2>Volunteer Opportunities</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
        <h2>Volunteer Opportunities</h2>
        @if(isset($volunteers) && count($volunteers) > 0)
            <div class="row mt-4">
                @foreach($volunteers as $volunteer)
                <div class="col-lg-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title">{{ $volunteer->title }}</h5>
                                <span class="badge bg-{{ $volunteer->status == 'open' ? 'success' : 'secondary' }}">{{ ucfirst($volunteer->status) }}</span>
                            </div>
                            @if($volunteer->location)
                            <p class="text-muted mb-2"><i class="bx bx-map"></i> {{ $volunteer->location }}</p>
                            @endif
                            <p class="card-text">{{ $volunteer->description }}</p>
                            @if($volunteer->requirements)
                            <div class="mt-3">
                                <h6 class="text-primary">Requirements:</h6>
                                <p class="small">{{ $volunteer->requirements }}</p>
                            </div>
                            @endif
                            @if($volunteer->status == 'open')
                            <div class="mt-3">
                                <a href="{{ route('contact') }}" class="btn btn-primary">Apply Now</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <img src="{{ asset('img/volunteer.jpg') }}" alt="" width="20%" class="mb-3">
            <p class="fs-4 text-secondary">No volunteer opportunities available at the moment. Please check back later.</p>
        @endif
        </div>
      </div>
    </div>
  </section>
  <!-- End Volunteer Opportunities Section -->

@endsection
