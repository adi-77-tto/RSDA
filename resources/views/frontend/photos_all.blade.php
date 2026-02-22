@extends('main')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Gallery</li>
      </ol>
      <h2>All Photo</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Ongoing Project Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="py-2">
            <h3 class="text-center">PHOTO <span class="text-danger">GALLERY</span></h3>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 mb-5">
            @foreach ($photos as $key => $data)
                <div class="col mt-3">
                    <img src="{{ asset('images/gallery/'.$data->image) }}" class="img-fluid" alt="image">
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center py-4">
            {{ $photos->links() }}
        </div>

      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">

      </div>

    </div>
  </section><!-- End Ongoing Project Section -->

@endsection
