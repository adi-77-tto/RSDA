@extends('main')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>News</li>
      </ol>
      <h2>Latest News</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Ongoing Project Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5">

        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('images/news/'.$news->image) }}" class="card-img-top" alt="activity" width="100%">
            </div>
            <div class="col-md-8 text-left">
                <h2 class="text-left">{{ $news->title }}</h2>
                <p class="text-secondary" style="font-size: 12px;">
                    <i class="fas fa-calendar-minus"></i>
                    {{ date("d/m/Y  h:i:s a") }}
                </p>
                <p style="text-align:justify;">
                    {{ $news->description }}
                </p>
            </div>
            <div class="col-12 py-4 text-center">
                <a href="{{ route('latest.news.all') }}" class="btn btn-warning text-dark fw-bold px-4">
                    <i class="fa fa-angle-left" aria-hidden="true"></i> Back to News & Events
                </a>
            </div>
        </div>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">

      </div>

    </div>
  </section><!-- End Ongoing Project Section -->

@endsection
