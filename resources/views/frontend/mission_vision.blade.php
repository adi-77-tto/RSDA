@extends('main')

@section('content')

@php
    $mv = $mission_vision ?? null;
    $placeholder = asset('img/testimonial.jpg');
@endphp

{{-- ===== MISSION ===== --}}
<div class="site-section section-counter" style="background:#fff;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 pr-md-5" data-aos="fade-right">
                <span class="block-48-text-1" style="color:#f7ca44; font-size:.85rem; font-weight:700; letter-spacing:.1em; text-transform:uppercase;">Who We Are</span>
                <h2 class="display-5 mb-3 mt-1" style="font-weight:700;">Our <span style="color:#f7ca44;">Mission</span></h2>
                <div style="width:60px; height:4px; background:#f7ca44; border-radius:2px; margin-bottom:1.2rem;"></div>
                <p class="text-secondary" style="text-align:justify; line-height:1.9;">{{ $mv->mission ?? '' }}</p>
            </div>
            <div class="col-md-6 mt-4 mt-md-0" data-aos="fade-left">
                <img src="{{ ($mv && $mv->mission_image) ? asset('images/mission_vision/'.$mv->mission_image) : $placeholder }}"
                     alt="Our Mission"
                     class="img-fluid rounded shadow"
                     style="width:100%; max-height:380px; object-fit:cover;">
            </div>
        </div>
    </div>
</div>
{{-- ===== VISION ===== --}}
<div class="site-section" style="background:#f8f9fa;">
    <div class="container">
        <div class="row align-items-center flex-md-row-reverse">
            <div class="col-md-6 pl-md-5" data-aos="fade-left">
                <span class="block-48-text-1" style="color:#f7ca44; font-size:.85rem; font-weight:700; letter-spacing:.1em; text-transform:uppercase;">Where We're Going</span>
                <h2 class="display-5 mb-3 mt-1" style="font-weight:700;">Our <span style="color:#f7ca44;">Vision</span></h2>
                <div style="width:60px; height:4px; background:#f7ca44; border-radius:2px; margin-bottom:1.2rem;"></div>
                <p class="text-secondary" style="text-align:justify; line-height:1.9;">{{ $mv->vision ?? '' }}</p>
            </div>
            <div class="col-md-6 mt-4 mt-md-0" data-aos="fade-right">
                <img src="{{ ($mv && $mv->vision_image) ? asset('images/mission_vision/'.$mv->vision_image) : $placeholder }}"
                     alt="Our Vision"
                     class="img-fluid rounded shadow"
                     style="width:100%; max-height:380px; object-fit:cover;">
            </div>
        </div>
    </div>
</div>
{{-- ===== VALUES ===== --}}
<div class="site-section section-counter" style="background:#fff;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 pr-md-5" data-aos="fade-right">
                <span class="block-48-text-1" style="color:#f7ca44; font-size:.85rem; font-weight:700; letter-spacing:.1em; text-transform:uppercase;">What We Stand For</span>
                <h2 class="display-5 mb-3 mt-1" style="font-weight:700;">Our <span style="color:#f7ca44;">Values</span></h2>
                <div style="width:60px; height:4px; background:#f7ca44; border-radius:2px; margin-bottom:1.2rem;"></div>
                <p class="text-secondary" style="text-align:justify; line-height:1.9;">{{ $mv->values_text ?? '' }}</p>
            </div>
            <div class="col-md-6 mt-4 mt-md-0" data-aos="fade-left">
                <img src="{{ ($mv && $mv->values_image) ? asset('images/mission_vision/'.$mv->values_image) : $placeholder }}"
                     alt="Our Values"
                     class="img-fluid rounded shadow"
                     style="width:100%; max-height:380px; object-fit:cover;">
            </div>
        </div>
    </div>
</div>

@endsection
