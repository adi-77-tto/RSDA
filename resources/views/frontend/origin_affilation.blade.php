@extends('main')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>About us</li>
      </ol>
      <h2>Origin and Legal Affiliation</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">

      <div class="section-title">
        <h2>Origin and Legal Affiliation: </h2>
        <p>
           Rural Society Development Association (RSDA) is legally registered with the Department of Social Welfare, Government of the People’s Republic of Bangladesh (Registration No. 481, dated 14 December 1985). The organization is also registered with the Department of Family Planning (Registration No. 225, dated 18 December 1988) and the NGO Affairs Bureau (NGOAB), Government of Bangladesh (Registration No. 1251, renewed on 11 March 2018).
        </p>
      </div>

      <div class="row">
        <div class="col text-start">
            <h5>Certificate of Legal Affilation:</h5>
                @foreach ($affilation as $key => $data)
                    <a href="{{ asset('images/legal_affilation/'.$data->file) }}" target="blank" class="btn btn-warning border border-dark m-2" style="font-size: 20px; font-weight:500; box-shadow: 5px 5px 0 rgba(0,0,0,1);"><i class="fa-solid fa-cloud-arrow-down"></i> {{ $data->name }}</a>
                @endforeach
        </div>
      </div>

    </div>
  </section><!-- End Contact Section -->

@endsection
