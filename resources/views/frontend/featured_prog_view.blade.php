@extends('main')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
      <li>Programs</li>
      </ol>
      <h2>Featured Programs</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  {{-- Featured Program Single View --}}
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
      <h2>Featured Program</h2>
      <div class="row">
        <div class="col text-start">
          @if(isset($program))
            @if($program->image)
              <img src="{{ asset('images/programs/'.$program->image) }}" alt="{{ $program->title }}" class="w-50">
            @endif
            <h3 class="mt-3">{{ $program->title }}</h3>
            @if($program->start_date || $program->status)
              <p class="text-secondary" style="font-size: 12px;">
                @if($program->start_date)
                  <i class="fas fa-calendar-minus"></i>
                  {{ \Carbon\Carbon::parse($program->start_date)->format('d/m/Y') }}
                @endif
                @if($program->status)
                  <span class="badge badge-{{ $program->status == 'active' ? 'success' : ($program->status == 'completed' ? 'secondary' : 'info') }} ml-2">{{ ucfirst($program->status) }}</span>
                @endif
              </p>
            @endif
            <p style="text-align: justify;">
              {{ $program->description }}
            </p>
          @else
            <p>No program found.</p>
          @endif
          <div class="py-3">
            <a href="{{ route('programs.all') }}" class="btn btn-danger"> <i class="fa fa-angle-left" aria-hidden="true"></i> Back to Programs</a>
          </div>
        </div>
      </div>
      </div>
    </div>
  </section>
  {{-- End of Featured Program Single View --}}


@endsection
