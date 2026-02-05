@extends('main')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>About us</li>
      </ol>
      <h2>Impact</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Impact Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
        <h2>Our Impact</h2>
        @if(isset($impact) && count($impact) > 0)
        <div class="row mt-5">
          @foreach($impact as $item)
          <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card text-center h-100 shadow-sm border-0">
              <div class="card-body">
                @if($item->icon)
                <i class="{{ $item->icon }} text-primary" style="font-size: 3rem;"></i>
                @endif
                <h3 class="mt-3 mb-2">{{ $item->metric_value }}</h3>
                <h5 class="text-muted">{{ $item->metric_unit }}</h5>
                <p class="card-title font-weight-bold">{{ $item->title }}</p>
                @if($item->description)
                <p class="card-text small text-secondary">{{ $item->description }}</p>
                @endif
                @if($item->year)
                <p class="text-muted small">Year: {{ $item->year }}</p>
                @endif
              </div>
            </div>
          </div>
          @endforeach
        </div>
        @else
        <p class="fs-4 text-secondary">The content will be updated soon.</p>
        @endif
      </div>
    </div>
  </section>
  <!-- End Impact Section -->

@endsection
