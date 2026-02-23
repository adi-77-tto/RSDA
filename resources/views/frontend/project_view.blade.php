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

  <section class="contact bg-light p-0">
    <div class="container bg-white py-5">

      {{-- Image Carousel --}}
      @if(isset($images) && $images->count())
      <div class="detail-slider-wrap mx-auto">
        @if($images->count() > 1)
        <button class="detail-arrow detail-arrow-left" onclick="detailSlide('projSlider', -1)" aria-label="Previous">
          <i class="fa fa-chevron-left"></i>
        </button>
        @endif

        <div class="detail-slider" id="projSlider">
          @foreach($images as $idx => $img)
          <div class="detail-slide" style="display:{{ $idx === 0 ? 'block' : 'none' }}">
            <img src="{{ asset('images/project/'.$img->image) }}" alt="{{ $project->title }}">
          </div>
          @endforeach
        </div>

        @if($images->count() > 1)
        <button class="detail-arrow detail-arrow-right" onclick="detailSlide('projSlider', 1)" aria-label="Next">
          <i class="fa fa-chevron-right"></i>
        </button>
        <div class="detail-counter" id="projSliderCounter">1 / {{ $images->count() }}</div>
        @endif
      </div>
      @endif

      {{-- Title --}}
      <h2 class="text-center mt-4 mb-1">{{ $project->title }}</h2>
      <p class="text-center text-secondary mb-3" style="font-size:13px">
        <i class="fas fa-calendar-minus"></i> {{ date('d/m/Y') }}
      </p>

      {{-- Description --}}
      <p style="text-align:justify; max-width:820px; margin:0 auto;">{{ $project->description }}</p>

      @if(!empty($project->donor))
      <p class="text-center mt-2"><strong>Donor:</strong> {{ $project->donor }}</p>
      @endif

      <div class="text-center py-4">
        <a href="{{ route('ongoing.project') }}" class="btn btn-warning text-dark fw-bold px-4">
          <i class="fa fa-angle-left"></i> Back to Ongoing Projects
        </a>
      </div>

    </div>
  </section>
@endsection

@push('css')
<style>
.detail-slider-wrap {
  position: relative;
  max-width: 760px;
  display: flex;
  align-items: center;
}
.detail-slider { flex: 1; min-width: 0; }
.detail-slide img {
  width: 100%;
  max-height: 460px;
  object-fit: cover;
  border-radius: 6px;
  display: block;
}
.detail-arrow {
  flex-shrink: 0;
  width: 44px;
  height: 44px;
  border-radius: 50%;
  background: rgba(0,0,0,0.55);
  color: #fff;
  border: none;
  font-size: 16px;
  cursor: pointer;
  transition: background .2s;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 5;
}
.detail-arrow:hover { background: rgba(0,0,0,0.85); }
.detail-arrow-left { margin-right: 10px; }
.detail-arrow-right { margin-left: 10px; }
.detail-counter {
  position: absolute;
  bottom: 10px;
  right: 60px;
  background: rgba(0,0,0,0.5);
  color: #fff;
  font-size: 12px;
  padding: 2px 9px;
  border-radius: 10px;
  pointer-events: none;
}
</style>
@endpush

@push('js')
<script>
function detailSlide(id, dir) {
  var slider = document.getElementById(id);
  var slides = slider.querySelectorAll('.detail-slide');
  var cur = Array.from(slides).findIndex(function(s){ return s.style.display !== 'none'; });
  slides[cur].style.display = 'none';
  cur = (cur + dir + slides.length) % slides.length;
  slides[cur].style.display = 'block';
  var counter = document.getElementById(id + 'Counter');
  if (counter) counter.textContent = (cur + 1) + ' / ' + slides.length;
}
</script>
@endpush
