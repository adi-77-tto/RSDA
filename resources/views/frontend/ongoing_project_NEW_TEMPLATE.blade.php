@extends('main')

@section('content')

<!-- Hero/Breadcrumbs -->
<div class="hero-wrap" style="background-image: url('{{ asset('images/bg1.png') }}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-7 ftco-animate text-center">
                <p class="breadcrumbs">
                    <span class="mr-2"><a href="{{ url('/') }}">Home</a></span> 
                    <span>Ongoing Projects</span>
                </p>
                <h1 class="mb-3 bread">Ongoing Projects</h1>
            </div>
        </div>
    </div>
</div>

<!-- Ongoing Project Section -->
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-4">Our Ongoing Projects</h2>
                <p>RSDA's Ongoing Projects actively address community needs, fostering sustainable development in northern Bangladesh.</p>
            </div>
        </div>

        <div class="row">
            @foreach ($project as $key=>$data)
                <div class="col-md-4 ftco-animate">
                    <div class="cause-entry">
                        <a href="{{ route('ongoing.project.view',$data->id) }}" class="img" style="background-image: url({{ asset('images/project/'.$data->image) }}); height: 300px;"></a>
                        <div class="text p-3 p-md-4">
                            <h3><a href="{{ route('ongoing.project.view',$data->id) }}">{{ Str::limit($data->title, 50, '...') }}</a></h3>
                            <span class="donation-time mb-3 d-block">
                                <i class="fas fa-calendar-alt"></i> {{ date("d M, Y") }}
                            </span>
                            <p>{{ Str::limit($data->description,120,"...") }}</p>
                            
                            @if(!empty($data->donor))
                                <p class="mb-2"><small><strong><i class="fas fa-hands-helping"></i> Donor:</strong> {{ Str::limit($data->donor, 40, '...') }}</small></p>
                            @endif
                            
                            <p>
                                <a href="{{ route('ongoing.project.view',$data->id) }}" class="btn btn-primary px-3 py-2">
                                    Read More <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    {{ $project->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
