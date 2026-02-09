@extends('main')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Stay Informed</li>
      </ol>
      <h2>Strategic Plan</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- Strategic Plan Section -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5">
      <div class="section-title">
        <h2>Strategic Plan</h2>
            <div class="row d-flex justify-content-center">
          @forelse ($strategicPlans as $plan)
            <div class="sol-sm-12 col-md-6 col-lg-4 mb-3">
              <a href="{{ asset('images/strategic_plans/pdfs/'.$plan->pdf_file) }}" target="blank" download>
                <div class="card h-100">
                  <div class="card-body py-4 text-center">
                    @if (!empty($plan->image))
                      <img src="{{ asset('images/strategic_plans/images/'.$plan->image) }}" alt="{{ $plan->title }}" style="max-width: 70%; height: auto;">
                    @else
                      <img src="{{ asset('img/logo.png') }}" alt="" width="50%">
                    @endif
                  </div>
                  <div class="card-footer">
                    <h5 class="fw-bold">{{ $plan->title }}</h5>
                    @if (!empty($plan->description))
                      <h6 class="text-dark">{{ $plan->description }}</h6>
                    @endif
                  </div>
                </div>
              </a>
            </div>
          @empty
            <div class="col-12 text-center py-4">
              <p class="text-muted mb-0">No strategic plan available right now.</p>
            </div>
          @endforelse
            </div>
      </div>
    </div>
  </section>
  <!-- End Strategic Plan Section -->

@endsection
