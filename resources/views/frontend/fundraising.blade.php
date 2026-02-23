@extends('main')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Get Involved</li>
      </ol>
      <h2>Fundraising</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Project Archieve Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
        <h2>Fundraising</h2>
        <div style="background-image: url('{{ asset('images/donation_page.png') }}'); background-size:cover; background-position:center;" class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-12 mx-auto text-center">
                        <h6 class="text-warning text-center">We need your cooperation</h6>
                        <h1 class="text-white text-center">Join our fundraising campaign and make a difference today! Together, let's create a brighter future for those in need</h1>
                        <a href="" class="btn btn-primary mt-3"><i class="fa-solid fa-link"></i> Join our Fundraising Campaign</a>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Project ArchievePartner and Donor Section -->

@endsection
