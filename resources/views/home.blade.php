@extends('main')

@section('title')
Rural Society Development Association
@endsection

@section('content')
{{-- slider --}}
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach ($slider as $skey => $slider)
        <div class="carousel-item @if($skey == 0) active @endif">
            <img src="{{ asset('images/slider/'.$slider->image) }}" class="d-block" alt="RSDA" style="width:100%; height: 600px; object-fit: cover;">
            <div class="carousel-caption" style="position:absolute !important; bottom:30px !important; top:auto !important; left:5% !important; right:10% !important; text-align:left !important;">
                <h2 class="text-white text-start" style="font-size: 3rem; font-weight: 700;">{{ $slider->title }}</h2>
                <div class="my-2" style="width:100px;border-bottom:5px solid #f7ca44;"></div>
                <p style="font-size:1rem;" class="text-white">
                    {{ $slider->description }}
                </p>
                <a href="{{ route('donate') }}" class="btn" style="background:#f7ca44; color:#000; font-weight:700; border:2px solid #f7ca44; box-shadow: 5px 5px 0 rgba(0,0,0,1);"> Donate now</a>
            </div>
        </div>
        @endforeach
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="left: 20px; width: 50px;">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="right: 20px; width: 50px;">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>
</div>
{{-- end of slide --}}

{{-- Who we are --}}
<div class="site-section section-counter">
    <div class="container">
        <div class="row">
            <div class="col-md-6 pr-5">
                <div class="block-48">
                    <span class="block-48-text-1">Served Over</span>
                    <div class="block-48-counter ftco-number" data-number="{{ preg_replace('/[^0-9]/', '', $people_metric->metric_value ?? '97000') }}">0</div>
                    <span class="block-48-text-1 mb-4 d-block">people in 1 district &mdash; Kurigram<br><small style="font-size:.75rem; font-weight:400;">(under 1 division, 4 upazilas, and 12 unions)</small></span>
                    <p class="mb-0"><a href="{{ route('programs.all') }}" class="btn btn-white px-3 py-2">View Our Program</a></p>
                </div>
            </div>
            <div class="col-md-6 welcome-text">
                <h2 class="display-4 mb-3">Who Are We?</h2>
                <p class="lead">Rural Society Development Association (RSDA) is a non-profit, non-political development organization established in 1984 in Kurigram, Bangladesh. We work with poor and disaster-affected communities—especially women and children—to reduce poverty, build resilience, and promote gender equality.</p>
                <p class="mb-4">Through community-led development and humanitarian support, RSDA helps people create sustainable and dignified livelihoods.</p>
                <p class="mb-0">
                    <a href="{{ route('donate') }}" class="btn btn-primary px-3 py-2 mr-2">Get Involved</a>
                    <a href="{{ route('contact') }}" class="btn btn-primary px-3 py-2">Contact Us</a>
                </p>
            </div>
        </div>
    </div>
</div>
{{-- End of who we are --}}

{{-- Mission Vision (How It Works style) --}}
<div class="site-section" style="background: #fff;">
    <div class="container">
        {{-- Section Header --}}
        <div class="row mb-5 justify-content-center">
            <div class="col-md-8 text-center">
                <span class="fp-label">WHO WE ARE</span>
                <h2 class="fp-heading mt-1">Our Mission <span class="fp-heading-accent">&amp; Vision</span></h2>
                <div class="fp-divider mx-auto"></div>
            </div>
        </div>
        {{-- Mission — text left, image right --}}
        <div class="row align-items-center mb-5 pb-5" style="border-bottom: 1px solid #f0f0f0;">
            <div class="col-md-5 pr-md-5">
                <h3 style="font-size: 1.9rem; font-weight: 700; color: #111; margin: 0 0 18px; line-height: 1.25;">Our Mission</h3>
                <p style="color: #666; line-height: 1.85; font-size: 0.97rem;">{{ $mission_vision->mission ?? 'Empowering communities through sustainable development and humanitarian support, building resilient and dignified livelihoods for all.' }}</p>
                <a href="{{ route('vision.mission') }}" style="color: #f7ca44; font-weight: 700;">Learn More &rarr;</a>
            </div>
            <div class="col-md-7 mt-4 mt-md-0">
                <img src="{{ asset('images/mission.jpg') }}" alt="Our Mission" style="width: 100%; height: 380px; object-fit: cover; border-radius: 6px; box-shadow: 0 8px 30px rgba(0,0,0,0.10);">
            </div>
        </div>
        {{-- Vision — image left, text right --}}
        <div class="row align-items-center pt-4">
            <div class="col-md-7 mb-4 mb-md-0">
                <img src="{{ asset('images/vision.jpg') }}" alt="Our Vision" style="width: 100%; height: 380px; object-fit: cover; border-radius: 6px; box-shadow: 0 8px 30px rgba(0,0,0,0.10);">
            </div>
            <div class="col-md-5 pl-md-5">
                <h3 style="font-size: 1.9rem; font-weight: 700; color: #111; margin: 0 0 18px; line-height: 1.25;">Our Vision</h3>
                <p style="color: #666; line-height: 1.85; font-size: 0.97rem;">{{ $mission_vision->vision ?? 'A world where all communities thrive with dignity, equity, and sustainable livelihoods for generations to come.' }}</p>
                <a href="{{ route('vision.mission') }}" style="color: #f7ca44; font-weight: 700;">Learn More &rarr;</a>
            </div>
        </div>
    </div>
</div>
{{-- End of Mission Vision --}}

{{-- Featured Programs --}}
<section class="fp-section scroll-reveal">
    <div class="container">
        {{-- Section Header --}}
        <div class="text-center mb-5">
            <span class="fp-label">OUR INITIATIVES</span>
            <h2 class="fp-heading">Featured <span class="fp-heading-accent">Programs</span></h2>
            <div class="fp-divider mx-auto"></div>
            <p class="fp-sub">Discover our key initiatives driving sustainable change and community empowerment.</p>
        </div>

        {{-- Program Cards --}}
        <div class="row">
            @if(isset($programs) && count($programs) > 0)
                @foreach($programs as $program)
                    @if($loop->iteration > 6) @break @endif
                    <div class="col-md-6 col-lg-4 mb-4">
                        <a href="{{ route('programs.view', $program->id) }}" class="fp-card-link">
                            <div class="fp-card">
                                <div class="fp-card-img-wrap">
                                    @if($program->image)
                                    <img src="{{ asset('images/programs/'.$program->image) }}" alt="{{ $program->title }}" class="fp-card-img">
                                    @else
                                    <img src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&w=400" alt="{{ $program->title }}" class="fp-card-img">
                                    @endif
                                </div>
                                <div class="fp-card-body">
                                    <h5 class="fp-card-title">{{ Str::limit($program->title, 60) }}</h5>
                                    <p class="fp-card-desc">{{ Str::limit($program->description ?? '', 120) }}</p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="fp-tag">{{ ucfirst($program->status ?? 'Active') }}</span>
                                        <span class="fp-card-date">
                                            {{ $program->start_date ? \Carbon\Carbon::parse($program->start_date)->format('M d, Y') : \Carbon\Carbon::parse($program->created_at)->format('M d, Y') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                @foreach([
                    ['title'=>'Women\'s Empowerment Initiative','status'=>'Active','desc'=>'Supporting rural women with skills training, micro-finance and leadership development to build self-reliant communities.','img'=>'https://images.pexels.com/photos/1756959/pexels-photo-1756959.jpeg?auto=compress&cs=tinysrgb&w=400','date'=>'Jan 15, 2024'],
                    ['title'=>'Youth Development Project','status'=>'Completed','desc'=>'Equipping young people with vocational training, mentorship and civic education to become future community leaders.','img'=>'https://images.pexels.com/photos/2659475/pexels-photo-2659475.jpeg?auto=compress&cs=tinysrgb&w=400','date'=>'Oct 21, 2023'],
                    ['title'=>'Healthcare Access Program','status'=>'Active','desc'=>'Providing primary healthcare, maternal care and health awareness services to underserved char and river-basin areas.','img'=>'https://images.pexels.com/photos/4388165/pexels-photo-4388165.jpeg?auto=compress&cs=tinysrgb&w=400','date'=>'Mar 10, 2024'],
                ] as $fp)
                <div class="col-md-6 col-lg-4 mb-4">
                    <a href="#" class="fp-card-link">
                        <div class="fp-card">
                            <div class="fp-card-img-wrap">
                                <img src="{{ $fp['img'] }}" alt="{{ $fp['title'] }}" class="fp-card-img">
                            </div>
                            <div class="fp-card-body">
                                <h5 class="fp-card-title">{{ $fp['title'] }}</h5>
                                <p class="fp-card-desc">{{ $fp['desc'] }}</p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="fp-tag">{{ $fp['status'] }}</span>
                                    <span class="fp-card-date">{{ $fp['date'] }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            @endif
        </div>

        {{-- View All Button --}}
        <div class="text-center mt-4">
            <a href="{{ route('programs.all') }}" class="btn btn-primary px-4 py-2">
                <i class="fa-solid fa-eye mr-1"></i> View All Programs
            </a>
        </div>
    </div>
</section>
{{-- End of Featured Programs --}}

{{-- Ongoing Project --}}
<div class="site-section fund-raisers bg-light">
    <div class="container scroll-reveal">
        <div class="row mb-3 justify-content-center">
            <div class="col-md-8 text-center">
                <span class="fp-label">WHAT WE DO</span>
                <h2 class="fp-heading mt-1">Ongoing <span class="fp-heading-accent">Projects</span></h2>
                <div class="fp-divider mx-auto"></div>
                <p class="fp-sub">RSDA's Ongoing Projects actively address community needs, fostering sustainable development in northern Bangladesh.</p>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="col-md-12 block-11">
            <div class="nonloop-block-11 owl-carousel">
                @foreach ($project as $key=>$project)
                <div class="card fundraise-item">
                    <a href="{{ route('ongoing.project.view',$project->id) }}">
                        <img class="card-img-top" src="{{ asset('images/project/'.$project->image) }}" alt="{{ $project->title }}" style="height: 250px; object-fit: cover;">
                    </a>
                    <div class="card-body">
                        <h3 class="card-title">
                            <a href="{{ route('ongoing.project.view',$project->id) }}">{{ Str::limit($project->title, 50, '...') }}</a>
                        </h3>
                        <p class="card-text">{{ Str::limit($project->description, 100, "...") }}</p>
                        @if(!empty($project->donor))
                            <span class="donation-time mb-3 d-block"><strong>Donor:</strong> {{ Str::limit($project->donor, 40, '...') }}</span>
                        @endif
                        

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- View All Projects Button - BELOW carousel --}}
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-auto">
                <a href="{{ route('ongoing.project') }}" class="btn btn-primary px-5 py-2">
                    <i class="fa-solid fa-eye mr-1"></i> View All Projects
                </a>
            </div>
        </div>
    </div>
</div>
{{-- End of Ongoing Project --}}

{{-- Sponsor --}}
<div class="site-section">
    <div class="container scroll-reveal">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="block-48" style="padding: 60px 50px; position: relative; overflow: hidden;">
                    <img src="{{ asset('images/donate-bg.jpg') }}" alt="" aria-hidden="true"
                         style="position: absolute; right: -30px; bottom: -20px; width: 340px; height: auto; opacity: 0.13; pointer-events: none; mix-blend-mode: luminosity; transform: rotate(-5deg);">
                    <h2 class="mb-3" style="position: relative; z-index: 1;"><span style="color: #000;">Sponsor</span> for Growing Fund</h2>
                    <p class="mb-4" style="color: #000; font-size: 1.1rem; position: relative; z-index: 1;">
                        Sponsor RSDA's growing fund to fuel impactful initiatives in northern Bangladesh, empowering communities and fostering positive change. Your support drives essential programs in healthcare, education, and community resilience, making a lasting difference in the lives of those in need. Join us in our mission to create a brighter future for all.
                    </p>
                    <a href="{{ route('contact') }}" class="btn btn-white px-5 py-2" style="position: relative; z-index: 1;"><i class="fa-solid fa-hand-holding-dollar"></i> Become a Sponsor</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End of Sponsor --}}

{{-- Latest News and Events --}}
<div class="site-section bg-light">
    <div class="container scroll-reveal">
        <div class="row mb-4 justify-content-center">
            <div class="col-md-8 text-center">
                <span class="fp-label">STAY INFORMED</span>
                <h2 class="fp-heading mt-1">Latest News <span class="fp-heading-accent">&amp; Events</span></h2>
                <div class="fp-divider mx-auto"></div>
                <p class="fp-sub">Get the latest updates from RSDA's community initiatives and upcoming events.</p>
            </div>
        </div>

        <div class="row">
            @foreach ($news as $key=>$data)
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
                <div class="post-entry">
                    <a href="{{ route('latest.news.view',$data->id) }}" class="mb-3 img-wrap d-block">
                        <img src="{{ asset('images/news/'.$data->image) }}" alt="{{ $data->title }}" class="img-fluid" style="height: 250px; width: 100%; object-fit: cover;">
                    </a>
                    <h3><a href="{{ route('latest.news.view',$data->id) }}">{{ Str::limit($data->title, 50, '...') }}</a></h3>
                    <span class="date mb-4 d-block text-muted">{{ date('F d, Y') }}</span>
                    <p>{{ Str::limit($data->description, 100, '...') }}</p>
                    <p><a href="{{ route('latest.news.view',$data->id) }}" class="link-underline">Read More</a></p>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <p><a href="{{ route('latest.news.all') }}" class="btn btn-primary px-4 py-3">View All News & Events</a></p>
            </div>
        </div>
    </div>
</div>
{{-- End of Latest News and Events --}}

{{-- Photo Gallery --}}
<div class="bg-light">
    <div class="container bg-white scroll-reveal">
        <div class="pt-5 pb-2 text-center">
            <span class="fp-label">OUR GALLERY</span>
            <h2 class="fp-heading mt-1">Photo <span class="fp-heading-accent">Gallery</span></h2>
            <div class="fp-divider mx-auto"></div>
            <p class="fp-sub">Stay updated with RSDA's latest news and events, offering insights into our impactful initiatives and community engagements.</p>
        </div>

        {{-- photo --}}
        <div class="row g-2">
            @foreach ($gallery->take(9) as $key => $data)
                <div class="col-4 mt-2">
                    <a href="{{ asset('images/gallery/'.$data->image) }}" class="gallery-lightbox">
                        <div class="gallery-item">
                            <img src="{{ asset('images/gallery/'.$data->image) }}" class="gallery-img" alt="Gallery Image">
                            <div class="gallery-overlay">
                                <i class="fa-solid fa-magnifying-glass-plus"></i>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        {{-- button --}}
        <div class="d-flex justify-content-center py-5">
            <a href="{{ route('photo.all') }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i> See all Photos</a>
        </div>
    </div>
</div>
{{-- End of Photo Gallery --}}

{{-- Impact part --}}
<div style="position: relative; overflow: hidden; background-image: url('{{asset('images/impact-bg.jpg')}}'); background-size: cover; background-position: center; background-attachment: fixed;">
    <div style="position: absolute; inset: 0; background: rgba(30,40,30,0.72); z-index: 0;"></div>
    <div class="container scroll-reveal" style="position: relative; z-index: 1;">
        <div class="p-5">
            <h4 class="text-uppercasse text-white text-center" style="font-size: 2rem; font-weight: 700; letter-spacing: .01em;"><span style="color: #f7ca44;">Our</span> Impact</h4>
            <div class="row justify-content-sm-center">
                <div class="col-md-6">
                    <p class="text-white py-2 text-center">
                        Transforming lives and communities in northern Bangladesh through sustainable development initiatives, empowering individuals and fostering positive change. Join us in making a lasting difference for a brighter future.
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                @forelse($impact as $metric)
                @php
                    $titleLower = strtolower($metric->title);
                    if (str_contains($titleLower, 'people') || str_contains($titleLower, 'beneficiar')) $emoji = '👥';
                    elseif (str_contains($titleLower, 'district')) $emoji = '📍';
                    elseif (str_contains($titleLower, 'year')) $emoji = '📅';
                    elseif (str_contains($titleLower, 'member')) $emoji = '🤝';
                    elseif (str_contains($titleLower, 'project')) $emoji = '🏗️';
                    else $emoji = '⭐';
                @endphp
                <div class="col-md-2 col-sm-6 col-xs-12 bg-white text-center py-2 mx-2 my-1 rounded">
                    @if($metric->icon)
                        <i class="{{ $metric->icon }} text-secondary pt-3"></i>
                    @else
                        <i class="fa-solid fa-chart-bar text-secondary pt-3"></i>
                    @endif
                    <h6>{{ $metric->title }}</h6>
                    <h2 style="color:#f7ca44; font-weight:700;">{{ $metric->metric_value }}</h2>
                    <div style="font-size: 1.4rem; line-height: 1;">{{ $emoji }}</div>
                </div>
                @empty
                {{-- Year --}}
                <div class="col-md-2 col-sm-6 col-xs-12 bg-white text-center py-2 mx-2 my-1 rounded">
                    <i class="fa-regular fa-calendar-check text-secondary pt-3"></i>
                    <h6>Year</h6>
                    <h2 style="color:#f7ca44; font-weight:700;">1998</h2>
                </div>
                {{-- District --}}
                <div class="col-md-2 col-sm-6 col-xs-12 bg-white text-center py-2 mx-2 my-1 rounded">
                    <i class="fa-solid fa-map-location-dot text-secondary pt-3"></i>
                    <h6>District</h6>
                    <h2 style="color:#f7ca44; font-weight:700;">03</h2>
                </div>
                {{-- Project --}}
                <div class="col-md-2 col-sm-6 col-xs-12 bg-white text-center py-2 mx-2 my-1 rounded">
                    <i class="fa-solid fa-hands-holding-circle text-secondary pt-3"></i>
                    <h6>Project</h6>
                    <h2 style="color:#f7ca44; font-weight:700;">41</h2>
                </div>
                {{-- People --}}
                <div class="col-md-2 col-sm-6 col-xs-12 bg-white text-center py-2 mx-2 my-1 rounded">
                    <i class="fa-solid fa-users-viewfinder text-secondary pt-3"></i>
                    <h6>People</h6>
                    <h2 style="color:#f7ca44; font-weight:700;">1.3M</h2>
                </div>
                @endforelse
            </div>

        </div>
    </div>
</div>
{{-- End of Impact part --}}

{{-- Success Stories --}}
<div class="success-stories-home" style="position: relative;">
    {{-- Slider-style nav buttons --}}
    <button class="ss-prev-btn" id="storiesPrev" aria-label="Previous story">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="ss-next-btn" id="storiesNext" aria-label="Next story">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
    <div class="owl-carousel stories-full-carousel">
        @forelse($stories as $story)
        <div class="item">
            {{-- Faded background image --}}
            <div class="ss-bg-img" style="background-image: url('{{ asset('images/stories/'.$story->image) }}')"></div>
            <div class="ss-overlay"></div>
            {{-- Content row --}}
            <div class="ss-inner">
                {{-- Left: photo --}}
                <div class="ss-photo-col">
                    <img src="{{ asset('images/stories/'.$story->image) }}" alt="{{ $story->beneficiary_name }}" class="ss-photo">
                </div>
                {{-- Right: text --}}
                <div class="ss-text-col">
                    <span class="ss-label">SUCCESS STORIES</span>
                    <h2 class="ss-heading">{{ $story->beneficiary_name }}</h2>
                    <p class="ss-desc">{{ Str::limit($story->description, 220) }}</p>
                    @if(!empty($story->beneficiary_title))
                    <p class="ss-role">— {{ $story->beneficiary_title }}</p>
                    @endif
                    <a href="{{ route('success.stories.view', $story->id) }}" class="ss-btn">READ THE FULL STORY</a>
                </div>
            </div>
        </div>
        @empty
        <div class="item">
            <div class="ss-bg-img" style="background-image: url('{{ asset('img/testimonial.jpg') }}')"></div>
            <div class="ss-overlay"></div>
            <div class="ss-inner">
                <div class="ss-photo-col">
                    <img src="{{ asset('img/testimonial.jpg') }}" alt="Success Story" class="ss-photo">
                </div>
                <div class="ss-text-col">
                    <span class="ss-label">SUCCESS STORIES</span>
                    <h2 class="ss-heading">Transforming Lives Through Community Development</h2>
                    <p class="ss-desc">RSDA's tireless efforts in promoting education, healthcare, and economic opportunities have transformed the lives of many marginalized individuals across northern Bangladesh.</p>
                    <a href="{{ route('success.stories') }}" class="ss-btn">READ THE FULL STORY</a>
                </div>
            </div>
        </div>
        @endforelse
    </div>
</div>
{{-- End of Success Stories --}}

{{-- Become a Volunteer --}}
@if(session('volunteer_success'))
<div class="container mt-3">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('volunteer_success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
</div>
@endif
<div style="background: #fff; padding: 60px 0; border-top: 1px solid #f0f0f0; border-bottom: 1px solid #f0f0f0;">
    <div class="container">
        <div class="row align-items-center justify-content-center g-5">

            {{-- Image --}}
            <div class="col-md-5 d-flex justify-content-center">
                <img src="{{ asset('images/volunteer.jpg') }}"
                     alt="Volunteer"
                     class="rounded shadow"
                     style="width: 100%; max-width: 480px; height: 380px; object-fit: cover;">
            </div>

            {{-- Form --}}
            <div class="col-md-5">
                <h2 style="color: #111; font-size: 2rem; font-weight: 400; margin-bottom: 24px;">Be A Volunteer Today</h2>
                <form action="{{ route('volunteer.apply') }}" method="POST">
                    @csrf
                    {{-- Name --}}
                    <div class="mb-3">
                        <input type="text"
                               class="form-control py-2 @error('name') is-invalid @enderror"
                               name="name"
                               placeholder="Enter your name"
                               value="{{ old('name') }}"
                               required
                               style="border: 1px solid #ccc; border-radius: 4px;">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    {{-- Phone --}}
                    <div class="mb-3">
                        <input type="text"
                               class="form-control py-2 @error('phone') is-invalid @enderror"
                               name="phone"
                               placeholder="Enter your phone number"
                               value="{{ old('phone') }}"
                               required
                               style="border: 1px solid #ccc; border-radius: 4px;">
                        @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    {{-- Email (optional) --}}
                    <div class="mb-3">
                        <input type="email"
                               class="form-control py-2 @error('email') is-invalid @enderror"
                               name="email"
                               placeholder="Enter your email (optional)"
                               value="{{ old('email') }}"
                               style="border: 1px solid #ccc; border-radius: 4px;">
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    {{-- Message --}}
                    <div class="mb-3">
                        <textarea name="message"
                                  rows="4"
                                  class="form-control py-2 @error('message') is-invalid @enderror"
                                  placeholder="Write your message"
                                  style="border: 1px solid #ccc; border-radius: 4px;">{{ old('message') }}</textarea>
                        @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <button type="submit"
                            class="btn px-5 py-2"
                            style="background: #fff; border: 1px solid #333; color: #333; letter-spacing: .1em; font-size: 13px; font-weight: 600;">
                        SEND
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
{{-- End of Become a Volunteer --}}

@endsection

@push('js')
<script>
    // Initialize Success Stories Owl Carousel
    $(document).ready(function(){
        // Gallery Lightbox
        $('.gallery-lightbox').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            closeBtnInside: false,
            fixedContentPos: true,
            mainClass: 'mfp-with-zoom mfp-img-mobile',
            image: {
                verticalFit: true,
                titleSrc: function(item) {
                    return '';
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

        // Animated Counter for Served Over Section
        var a = 0;
        $(window).scroll(function() {
            var oTop = $('.ftco-number').offset().top - window.innerHeight;
            if (a == 0 && $(window).scrollTop() > oTop) {
                $('.ftco-number').each(function() {
                    var $this = $(this),
                        countTo = $this.attr('data-number');
                    $({
                        countNum: $this.text()
                    }).animate({
                        countNum: countTo
                    }, {
                        duration: 2000,
                        easing: 'swing',
                        step: function() {
                            $this.text(Math.floor(this.countNum).toLocaleString());
                        },
                        complete: function() {
                            $this.text(this.countNum.toLocaleString());
                        }
                    });
                });
                a = 1;
            }
        });
        
        var $storiesOwl = $('.stories-full-carousel').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            items: 1
        });
        $('#storiesPrev').on('click', function() {
            $storiesOwl.trigger('prev.owl.carousel');
        });
        $('#storiesNext').on('click', function() {
            $storiesOwl.trigger('next.owl.carousel');
        });
        
        // Initialize Fundraisers/Projects Owl Carousel
        $('.nonloop-block-11').owlCarousel({
            loop: false,
            margin: 30,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        });
    });
</script>
@endpush
