@extends('main')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
      <li>Programs</li>
      </ol>
      <h2>Featured Programs</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  {{-- Featured Program Single View --}}
  <section class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      @if(isset($program))

        {{-- Image Carousel (centered) --}}
        @if(isset($images) && $images->count())
        <div class="detail-slider-wrap mx-auto">
          @if($images->count() > 1)
          <button class="detail-arrow detail-arrow-left" onclick="detailSlide('pgSlider', -1)" aria-label="Previous">
            <i class="fa fa-chevron-left"></i>
          </button>
          @endif
          <div class="detail-slider" id="pgSlider">
            @foreach($images as $idx => $img)
            <div class="detail-slide" style="display:{{ $idx === 0 ? 'block' : 'none' }}">
              <img src="{{ asset('images/programs/'.$img->image) }}" alt="{{ $program->title }}">
            </div>
            @endforeach
          </div>
          @if($images->count() > 1)
          <button class="detail-arrow detail-arrow-right" onclick="detailSlide('pgSlider', 1)" aria-label="Next">
            <i class="fa fa-chevron-right"></i>
          </button>
          <div class="detail-counter" id="pgSliderCounter">1 / {{ $images->count() }}</div>
          @endif
        </div>
        @endif

        {{-- Title --}}
        <h2 class="text-center mt-4 mb-2">{{ $program->title }}</h2>

        {{-- Meta --}}
        @if($program->start_date || $program->status)
        <p class="text-center text-secondary mb-3" style="font-size:13px">
          @if($program->start_date)
            <i class="fas fa-calendar-minus"></i> {{ \Carbon\Carbon::parse($program->start_date)->format('d/m/Y') }}
          @endif
          @if($program->status)
            <span class="badge badge-{{ $program->status=='active' ? 'success' : ($program->status=='completed' ? 'secondary' : 'info') }} ml-2">
              {{ ucfirst($program->status) }}
            </span>
          @endif
        </p>
        @endif

        {{-- Description --}}
        <p style="text-align:justify; max-width:820px; margin:0 auto;">{{ $program->description }}</p>

        <div class="text-center py-4">
          <a href="{{ route('programs.all') }}" class="btn btn-danger">
            <i class="fa fa-angle-left"></i> Back to Programs
          </a>
        </div>
      @else
        <p class="text-center">No program found.</p>
      @endif
    </div>
  </section>
  {{-- End of Featured Program Single View --}}

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
}
.detail-arrow:hover { background: rgba(0,0,0,0.85); }
.detail-arrow-left  { margin-right: 10px; }
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
