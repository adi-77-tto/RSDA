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

  <style>
    .row-cols-7 > * {
      flex: 0 0 auto;
      width: 14.2857%;
    }
    @media (max-width: 991px) {
      .row-cols-7 > * { width: 25%; }
    }
    @media (max-width: 575px) {
      .row-cols-7 > * { width: 33.333%; }
    }
    .volunteer-card {
      border: none;
      border-radius: 14px;
      box-shadow: 0 3px 14px rgba(0,0,0,0.08);
      transition: transform 0.2s, box-shadow 0.2s;
      text-align: center;
      padding: 18px 8px 14px;
      background: #fff;
    }
    .volunteer-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 8px 24px rgba(0,0,0,0.13);
    }
    .volunteer-avatar {
      width: 62px;
      height: 62px;
      border-radius: 50%;
      background: #1a5fad;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 10px;
    }
    .volunteer-avatar i {
      font-size: 2rem;
      color: #ffffff;
    }
    .volunteer-name {
      font-size: 0.82rem;
      font-weight: 600;
      color: #2c3e50;
      margin-bottom: 0;
      word-break: break-word;
    }
    .volunteer-form-section {
      background: #f8faff;
      border-radius: 20px;
      padding: 40px 36px;
      box-shadow: 0 4px 24px rgba(0,0,0,0.07);
    }
    .volunteer-form-section h3 {
      font-weight: 700;
      color: #2c3e50;
      margin-bottom: 6px;
    }
    .volunteer-form-section .subtitle {
      color: #6c757d;
      margin-bottom: 28px;
      font-size: 0.97rem;
    }
    .vol-input {
      border-radius: 10px;
      border: 1.5px solid #dee2e6;
      padding: 10px 14px;
      transition: border-color 0.2s;
    }
    .vol-input:focus {
      border-color: #4e73df;
      box-shadow: 0 0 0 3px rgba(78,115,223,0.12);
    }
    .btn-volunteer-submit {
      background: #c9a227;
      border: none;
      border-radius: 8px;
      padding: 7px 24px;
      font-weight: 600;
      font-size: 0.88rem;
      letter-spacing: 0.03em;
      color: #fff;
      transition: background 0.2s;
    }
    .btn-volunteer-submit:hover {
      background: #a8851a;
      color: #fff;
    }
  </style>

  <section class="bg-light">
    <div class="container pt-1 pb-5" data-aos="fade-up">

      <!-- Section Title -->
      <div class="section-title text-center mb-2">
        <h2>Our Volunteers</h2>
        <p class="text-muted">Meet the people who make our work possible.</p>
      </div>

      @if(session('volunteer_success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('volunteer_success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      <!-- Volunteer Cards: 7 per row -->
      @if(isset($volunteers) && count($volunteers) > 0)
        <div class="row row-cols-7 g-3 mb-5">
          @foreach($volunteers as $volunteer)
            <div class="col">
              <div class="volunteer-card h-100">
                <div class="volunteer-avatar">
                  <i class="bx bx-user"></i>
                </div>
                <p class="volunteer-name">{{ $volunteer->name ?? $volunteer->title ?? 'Volunteer' }}</p>
              </div>
            </div>
          @endforeach
        </div>
      @else
        <div class="text-center mb-5">
          <div class="volunteer-avatar mx-auto mb-3"><i class="bx bx-user"></i></div>
          <p class="text-muted fs-5">No volunteers yet. Be the first to join!</p>
        </div>
      @endif

      <!-- Be a Volunteer Form -->
      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-8">
          <div class="volunteer-form-section">
            <h3>Be a Volunteer</h3>
            <p class="subtitle">Fill in the form below and we will get back to you soon.</p>

            @if($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form action="{{ route('volunteer.apply') }}" method="POST">
              @csrf
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                  <input type="text" name="name" class="form-control vol-input" value="{{ old('name') }}" placeholder="Your full name" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Phone <span class="text-danger">*</span></label>
                  <input type="text" name="phone" class="form-control vol-input" value="{{ old('phone') }}" placeholder="e.g. 017xxxxxxxx" required>
                </div>
                <div class="col-md-12">
                  <label class="form-label fw-semibold">Email</label>
                  <input type="email" name="email" class="form-control vol-input" value="{{ old('email') }}" placeholder="your@email.com">
                </div>
                <div class="col-md-12">
                  <label class="form-label fw-semibold">Why do you want to volunteer?</label>
                  <textarea name="message" class="form-control vol-input" rows="4" placeholder="Tell us a little about yourself and your motivation...">{{ old('message') }}</textarea>
                </div>
                <div class="col-12 text-center mt-3">
                  <button type="submit" class="btn btn-volunteer-submit">
                    <i class="bx bx-send me-1"></i> Submit Application
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- End Be a Volunteer Form -->

    </div>
  </section>
  <!-- End Volunteer Opportunities Section -->

@endsection
