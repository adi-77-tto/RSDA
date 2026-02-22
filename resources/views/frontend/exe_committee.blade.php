@extends('main')

@section('content')

  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">

      <div class="section-title">
        <h2>Governance Structure/Organogram of RSDA</h2>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col text-start">
            <h5>Organizational Structure:</h5>
                <a href="{{ asset('frontend/file/AFAD_Organogram.pdf') }}" target="blank" class="btn btn-primary border border-dark m-2" style="font-size: 20px; font-weight:500; box-shadow: 5px 5px 0 rgba(0,0,0,1);"><i class="fa-solid fa-cloud-arrow-down"></i> Organizational Structure Pdf</a>
        </div>
      </div>

      @if(isset($committee) && count($committee) > 0)
      <div class="row mt-4" data-aos="fade-up" data-aos-delay="200">
        @foreach($committee as $member)
        <div class="col-12 col-md-6 col-lg-3 text-center mb-5">
          <div class="mx-auto mb-3" style="width:160px; height:160px; overflow:hidden; border-radius:10px; box-shadow:0 4px 15px rgba(0,0,0,.1);">
            @if(isset($member->photo) && $member->photo)
              <img loading="lazy" src="{{ asset('images/executive_committee/'.$member->photo) }}" alt="{{ $member->name }}" style="width:100%; height:100%; object-fit:cover;">
            @else
              <img loading="lazy" src="{{ asset('img/testimonial.jpg') }}" alt="{{ $member->name }}" style="width:100%; height:100%; object-fit:cover;">
            @endif
          </div>
          <h5 class="mb-0" style="font-weight:700;">{{ $member->name }}</h5>
          <p style="font-size:.75rem; letter-spacing:.12em; color:#aaa; text-transform:uppercase; margin-bottom:.6rem;">{{ $member->designation }}</p>
          @if(isset($member->bio) && $member->bio)
            <p style="font-size:.9rem; color:#8e6bbf; line-height:1.7;">{{ Str::limit($member->bio, 130) }}</p>
          @endif
        </div>
        @endforeach
      </div>
      @endif

    </div>
  </section><!-- End Executive Committee Section -->

@endsection
