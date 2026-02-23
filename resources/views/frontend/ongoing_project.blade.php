@extends('main')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>What We Do</li>
      </ol>
      <h2>Ongoing Projects</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5">

      <div class="section-title">
        <h2>Ongoing Projects</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 mt-2">
            @foreach ($project as $key=>$data)
                <div class="col">
                    <div class="card border-0 shadow-sm h-100 text-start">
                        <img src="{{ asset('images/project/'.$data->image) }}" class="card-img-top" alt="activity" style="height:170px; object-fit:cover;">
                        <div class="card-body d-flex flex-column" style="padding:14px;">
                            <h6 class="card-title mb-1" style="font-size:14px; font-weight:700; line-height:1.3;">{{ Str::limit($data->title, 50, '...') }}</h6>
                            <p class="text-secondary mb-1" style="font-size: 11px;">
                                <i class="fas fa-calendar-minus"></i>
                                {{ date("d/m/Y") }}
                            </p>
                            <p class="card-text" style="font-size:12px; color:#555; flex-grow:1;">
                                {{ Str::limit($data->description, 70, "...") }}
                            </p>
                            @if(!empty($data->donor))
                              <p class="mb-1"><small style="font-size:11px;"><strong>Donor:</strong> {{ Str::limit($data->donor, 30, '...') }}</small></p>
                            @endif
                            <a href="{{ route('ongoing.project.view',$data->id) }}" class="text-primary mt-auto" style="font-size:12px; font-weight:600;">
                                <i class="fa fa-arrow-right"></i> Read More
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
      </div>

      <div class="d-flex justify-content-center mt-3">
          {{ $project->links() }}
      </div>

    </div>
  </section>

@endsection
