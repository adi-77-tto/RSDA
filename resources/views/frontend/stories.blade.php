@extends('main')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Programs</li>
      </ol>
      <h2>Success Stories</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  {{-- Success Stories --}}
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
        <h2>Success Stories</h2>
        @if(isset($stories) && count($stories) > 0)
            <div class="row p-3">
                @foreach($stories as $story)
                <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 px-0 mb-3">
                    <a href="{{ route('success.stories.view', $story->id) }}">
                        <div class="featuredImage">
                            @if($story->image)
                            <img src="{{ asset('images/stories/'.$story->image) }}" alt="{{ $story->title }}">
                            @else
                            <img src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="{{ $story->title }}">
                            @endif
                            <div class="overlay">
                                <p class="h4">{{ $story->title }}</p>
                                <p class="textmuted">{{ Str::limit($story->description, 120) }}</p>
                                @if($story->beneficiary_name)
                                <p class="text-white small mt-2"><strong>Beneficiary:</strong> {{ $story->beneficiary_name }}</p>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-muted fs-5">No success stories available at the moment.</p>
        @endif
        </div>
      </div>
    </div>
  </section>
  {{-- End of Success Stories --}}
@endsection
