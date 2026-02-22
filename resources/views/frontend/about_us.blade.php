@extends('main')

@section('content')

  <!-- Our History Section -->
  <section class="site-section py-5" data-aos="fade-up">
    <div class="container">
      <div class="row align-items-center mb-4">
        <div class="col-12">
          <h1 class="mb-3" style="font-weight:700; color:#2c3e50;">Our History</h1>
          <div class="title-underline mb-4" style="width:60px; height:4px; background:#f7ca44; border-radius:2px;"></div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          @if(isset($about_us) && $about_us)
            <p style="text-align:justify; line-height:1.9; color:#444;">{{ $about_us->description }}</p>
          @else
            <p class="text-muted">Organization history coming soon.</p>
          @endif
        </div>
      </div>
    </div>
  </section>
  <!-- End Our History Section -->



@endsection
