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
            <h5 class="mb-4">Certificate of Legal Affilation:</h5>
            <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 g-4 mt-1">
                @foreach ($affilation as $key => $data)
                    <div class="col">
                      <a href="{{ asset('images/legal_affilation/'.$data->file) }}" download="{{ $data->name }}.pdf" class="text-decoration-none">
                        <div class="card border-0 shadow-sm h-100 text-center pdf-card">
                          <div class="card-body d-flex flex-column align-items-center justify-content-center py-4 px-3">
                            <i class="fa-solid fa-file-pdf" style="font-size:52px; color:#e03e2d; margin-bottom:14px;"></i>
                            <p class="mb-0" style="font-size:13px; font-weight:600; color:#222; line-height:1.4; word-break:break-word;">{{ $data->name }}.pdf</p>
                          </div>
                          <div class="card-footer bg-transparent border-top-0 pb-3">
                            <span class="btn btn-sm btn-warning text-dark fw-bold w-100" style="font-size:12px;">
                              <i class="fa-solid fa-cloud-arrow-down"></i> Download
                            </span>
                          </div>
                        </div>
                      </a>
                    </div>
                @endforeach
            </div>
        </div>
      </div>

    </div>
  </section><!-- End Contact Section -->

@endsection
