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

  <!-- ======= Photo Gallery Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="text-center mb-4" data-aos="fade-up">
            <span class="fp-label">OUR GALLERY</span>
            <h2 class="fp-heading mt-1">Photo <span class="fp-heading-accent">Gallery</span></h2>
            <div class="fp-divider mx-auto"></div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 mb-5" id="pgGallery">
            @foreach ($photos as $data)
                <div class="col mt-3">
                    <a href="{{ asset($data->image_path) }}" class="pg-lightbox" title="{{ $data->title ?? '' }}">
                        <div class="gallery-item" style="height:200px;">
                            <img src="{{ asset($data->image_path) }}" class="gallery-img" alt="{{ $data->title ?? 'Gallery image' }}">
                            <div class="gallery-overlay pg-title-overlay">
                                @if(!empty($data->title))
                                <span class="pg-title-text">{{ $data->title }}</span>
                                @else
                                <i class="fa-solid fa-magnifying-glass-plus"></i>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center py-4">
            {{ $photos->links() }}
        </div>

    </div>
  </section><!-- End Photo Gallery Section -->

@endsection

@push('css')
<style>
/* Title overlay slides up on hover (overrides the icon-only style) */
#pgGallery .gallery-overlay {
  background: linear-gradient(transparent 30%, rgba(0,0,0,0.72));
  opacity: 0;
  transition: opacity .3s ease;
  align-items: flex-end;
  padding-bottom: 10px;
}
#pgGallery .gallery-item:hover .gallery-overlay {
  opacity: 1;
}
.pg-title-text {
  color: #fff;
  font-size: 13px;
  font-weight: 600;
  line-height: 1.3;
  padding: 0 10px;
  text-shadow: 0 1px 4px rgba(0,0,0,0.7);
}
</style>
@endpush

@push('js')
<script>
$(document).ready(function(){
  $('#pgGallery').magnificPopup({
    delegate: '.pg-lightbox',
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: 'mfp-with-zoom mfp-img-mobile',
    image: {
      verticalFit: true,
      titleSrc: function(item) {
        return item.el.attr('title') || '';
      }
    },
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0, 1]
    },
    zoom: {
      enabled: true,
      duration: 300,
      opener: function(element) {
        return element.find('img');
      }
    }
  });
});
</script>
@endpush
