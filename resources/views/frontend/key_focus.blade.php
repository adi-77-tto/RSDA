@extends('main')

@section('content')

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>What we do</li>
        </ol>
        <h2>Key Focus Area</h2>
    </div>
</section>
<!-- End Breadcrumbs -->

@php
    $placeholder = asset('img/testimonial.jpg');
    $areas = $focus_areas ?? collect();
@endphp

@forelse($areas as $item)
    @php
        $imageUrl = null;
        if (!empty($item->image_path)) {
            $imageUrl = asset('storage/' . $item->image_path);
        }
        $isEven = $loop->index % 2 === 0;
        $bg      = $isEven ? '#fff' : '#f8f9fa';
    @endphp

    <div class="site-section" style="background:{{ $bg }};">
        <div class="container">
            <div class="row align-items-center {{ $isEven ? '' : 'flex-md-row-reverse' }}">

                {{-- Text column --}}
                <div class="col-md-6 {{ $isEven ? 'pr-md-5' : 'pl-md-5' }}" data-aos="{{ $isEven ? 'fade-right' : 'fade-left' }}">
                    <span style="color:#f7ca44; font-size:.85rem; font-weight:700; letter-spacing:.1em; text-transform:uppercase;">
                        What We Do
                    </span>
                    <h2 class="display-5 mb-3 mt-1" style="font-weight:700;">
                        {{ $item->title }}
                    </h2>
                    <div style="width:60px; height:4px; background:#f7ca44; border-radius:2px; margin-bottom:1.2rem;"></div>
                    <p class="text-secondary" style="text-align:justify; line-height:1.9;">
                        {{ $item->description ?? '' }}
                    </p>
                </div>

                {{-- Image column --}}
                <div class="col-md-6 mt-4 mt-md-0" data-aos="{{ $isEven ? 'fade-left' : 'fade-right' }}">
                    <img src="{{ $imageUrl ?? $placeholder }}"
                         alt="{{ $item->title }}"
                         class="img-fluid rounded shadow"
                         style="width:100%; max-height:380px; object-fit:cover;">
                </div>

            </div>
        </div>
    </div>

@empty
    <div class="site-section" style="background:#fff;">
        <div class="container text-center py-5">
            <p class="text-secondary fs-5">No focus areas available at the moment.</p>
        </div>
    </div>
@endforelse

@endsection
