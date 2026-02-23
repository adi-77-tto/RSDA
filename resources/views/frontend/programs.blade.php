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
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 mt-2">
                @foreach($programs as $program)
                <div class="col">
                    <div class="card border-0 shadow-sm h-100 text-start">
                        @if($program->image)
                        <img src="{{ asset('images/programs/'.$program->image) }}" class="card-img-top" alt="{{ $program->title }}" style="height:170px; object-fit:cover;">
                        @else
                        <img src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="card-img-top" alt="{{ $program->title }}" style="height:170px; object-fit:cover;">
                        @endif
                        <div class="card-body d-flex flex-column" style="padding:14px;">
                            <h6 class="card-title mb-1" style="font-size:14px; font-weight:700; line-height:1.3;">{{ Str::limit($program->title, 50, '...') }}</h6>
                            <p class="card-text" style="font-size:12px; color:#555; flex-grow:1;">
                                {{ Str::limit($program->description, 70, "...") }}
                            </p>
                            <div class="d-flex align-items-center justify-content-between mt-auto">
                                <span class="fp-tag {{ $program->status == 'active' ? '' : ($program->status == 'completed' ? 'fp-tag-completed' : 'fp-tag-alt') }}" style="font-size:12px; padding:4px 14px;">
                                    {{ ucfirst($program->status) }}
                                </span>
                                <a href="{{ route('programs.view', $program->id) }}" class="text-primary" style="font-size:12px; font-weight:600;">
                                    <i class="fa fa-arrow-right"></i> Read More
                                </a>
                            </div>
                        </div>
                    </div>
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
