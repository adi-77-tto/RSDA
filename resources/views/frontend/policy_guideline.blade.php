@extends('main')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Stay Informed</li>
      </ol>
      <h2>Policy and Guideline</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Policy and Guideline Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5">
      <div class="section-title">
        <h2>Policy and Guideline</h2>
      </div>
      @if(isset($policy) && count($policy) > 0)
        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 g-4 mt-1">
          @foreach ($policy as $data)
            <div class="col">
              <a href="{{ asset('images/policy_guideline/'.$data->file) }}" download="{{ $data->name }}.pdf" class="text-decoration-none">
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
      @else
        <p class="text-center text-muted">No policies available at the moment.</p>
      @endif
    </div>
  </section>
  <!-- End Policy and Guideline Section -->

@endsection
