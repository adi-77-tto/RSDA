@extends('main')

@section('content')

  <section class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">

      <div class="section-title">
        <h2>General Members</h2>
      </div>

      @if(isset($team) && count($team) > 0)
      <div class="row mt-4">
        @foreach($team as $member)
        <div class="col-12 col-md-6 col-lg-3 text-center mb-5">
          <div class="mx-auto mb-3" style="width:160px; height:160px; overflow:hidden; border-radius:10px; box-shadow:0 4px 15px rgba(0,0,0,.1);">
            @if($member->photo)
              <img loading="lazy" src="{{ asset('images/team_members/'.$member->photo) }}" alt="{{ $member->name }}" style="width:100%; height:100%; object-fit:cover;">
            @else
              <img loading="lazy" src="{{ asset('img/testimonial.jpg') }}" alt="{{ $member->name }}" style="width:100%; height:100%; object-fit:cover;">
            @endif
          </div>
          <h5 class="mb-0" style="font-weight:700;">{{ $member->name }}</h5>
          <p style="font-size:.75rem; letter-spacing:.12em; color:#aaa; text-transform:uppercase; margin-bottom:.6rem;">{{ $member->designation }}</p>
          @if(isset($member->department) && $member->department)
            <p class="text-muted small">{{ $member->department }}</p>
          @endif
          @if(isset($member->bio) && $member->bio)
            <p style="font-size:.9rem; color:#8e6bbf; line-height:1.7;">{{ Str::limit($member->bio, 130) }}</p>
          @endif
        </div>
        @endforeach
      </div>
      @else
      <p class="text-center text-muted py-5">No members found.</p>
      @endif

    </div>
  </section>

@endsection
