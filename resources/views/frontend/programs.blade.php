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

  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
        <h2>Featured Programs</h2>
        @if(isset($programs) && count($programs) > 0)
            <div class="row p-3">
                @foreach($programs as $program)
                <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 px-0 mb-3">
                    <a href="{{ route('programs.view', $program->id) }}">
                        <div class="featuredImage">
                            @if($program->image)
                            <img src="{{ asset('images/programs/'.$program->image) }}" alt="{{ $program->title }}">
                            @else
                            <img src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="{{ $program->title }}">
                            @endif
                            <div class="overlay">
                                <p class="h4">{{ $program->title }}</p>
                                <p class="textmuted">{{ Str::limit($program->description, 120) }}</p>
                                <span class="badge bg-{{ $program->status == 'active' ? 'success' : ($program->status == 'completed' ? 'secondary' : 'info') }} mt-2">{{ ucfirst($program->status) }}</span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-muted fs-5">No programs available at the moment.</p>
        @endif
        </div>
      </div>
    </div>
  </section>
  <!-- End of Featured Programs -->

@endsection
