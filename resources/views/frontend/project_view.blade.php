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

        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('images/project/'.$project->image) }}" class="card-img-top" alt="activity" width="100%">
            </div>
            <div class="col-md-8 text-left">
                <h2 class="text-left">{{ $project->title }}</h3>
                <p class="text-secondary" style="font-size: 12px;">
                    <i class="fas fa-calendar-minus"></i>
                    {{ date("d/m/Y  h:i:s a") }}
                </p>
                <p style="text-align:justify;">
                    {{ $project->description }}
                </p>
              @if(!empty($project->donor))
                <p style="text-align:justify;" class="mt-2">
                  <strong>Donor:</strong> {{ $project->donor }}
                </p>
              @endif
            </div>
            <div class="py-3">
                <a href="{{ route('ongoing.project') }}" class="btn btn-danger"> <i class="fa fa-angle-left" aria-hidden="true"></i> Back to Ongoing Project</a>
            </div>
        </div>
      </div>

    </div>
  </section><!-- End Ongoing Project Section -->

@endsection
