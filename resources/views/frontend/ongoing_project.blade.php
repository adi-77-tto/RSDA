@extends('main')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>What We Do</li>
      </ol>
      <h2>Ongoing Project</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Ongoing Project Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5">

      <div class="section-title">
        <h2>Ongoing Project</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($project as $key=>$data)
                <div class="col">
                    <div class="card border-0 shadow text-start">
                        <img src="{{ asset('images/project/'.$data->image) }}" class="card-img-top" alt="activity" width="100%" height="200px">
                        <div class="card-body">
                            <h4 class="card-title">{{ Str::limit($data->title, 25, '...') }}</h4>
                            <p class="text-secondary" style="font-size: 12px;">
                                <i class="fas fa-calendar-minus"></i>
                                {{ date("d/m/Y  h:i:s a") }}
                            </p>
                            <p class="card-text py-3">
                                {{ Str::limit($data->description,75,"...") }}
                            </p>
                            @if(!empty($data->donor))
                              <p class="mb-1"><small><strong>Donor:</strong> {{ Str::limit($data->donor, 40, '...') }}</small></p>
                            @endif
                            <a href="{{ route('ongoing.project.view',$data->id) }}" class="text-primary"> <i class="fa fa-arrow-right" aria-hidden="true"></i> Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $project->links() }}
    </div>

    <div class="row" data-aos="fade-up" data-aos-delay="100">

    </div>

    </div>
  </section><!-- End Ongoing Project Section -->

@endsection
