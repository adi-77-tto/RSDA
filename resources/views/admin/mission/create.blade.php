@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Add Mission and Vision </h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('mission.vision.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- MISSION --}}
                        <div class="col-12"><h6 class="text-uppercase text-primary border-bottom pb-1">Mission</h6></div>
                        <div class="col-md-8">
                            <label for="mission" class="form-label">Mission Text</label>
                            <textarea id="mission" name="mission" class="form-control @error('mission') is-invalid @enderror" rows="4">{{ old('mission', $mission->mission ?? '') }}</textarea>
                            @error('mission')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Mission Image</label>
                            @if(!empty($mission->mission_image))
                                <div class="mb-2"><img src="{{ asset('images/mission_vision/'.$mission->mission_image) }}" style="max-height:80px; border-radius:4px;"></div>
                            @endif
                            <input type="file" name="mission_image" class="form-control @error('mission_image') is-invalid @enderror" accept="image/*">
                            @error('mission_image')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        {{-- VISION --}}
                        <div class="col-12"><h6 class="text-uppercase text-primary border-bottom pb-1">Vision</h6></div>
                        <div class="col-md-8">
                            <label for="vision" class="form-label">Vision Text</label>
                            <textarea id="vision" name="vision" class="form-control @error('vision') is-invalid @enderror" rows="4">{{ old('vision', $mission->vision ?? '') }}</textarea>
                            @error('vision')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Vision Image</label>
                            @if(!empty($mission->vision_image))
                                <div class="mb-2"><img src="{{ asset('images/mission_vision/'.$mission->vision_image) }}" style="max-height:80px; border-radius:4px;"></div>
                            @endif
                            <input type="file" name="vision_image" class="form-control @error('vision_image') is-invalid @enderror" accept="image/*">
                            @error('vision_image')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        {{-- VALUES --}}
                        <div class="col-12"><h6 class="text-uppercase text-primary border-bottom pb-1">Values</h6></div>
                        <div class="col-md-8">
                            <label for="values" class="form-label">Values Text</label>
                            <textarea id="values" name="values" class="form-control @error('values') is-invalid @enderror" rows="4">{{ old('values', $mission->values_text ?? '') }}</textarea>
                            @error('values')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Values Image</label>
                            @if(!empty($mission->values_image))
                                <div class="mb-2"><img src="{{ asset('images/mission_vision/'.$mission->values_image) }}" style="max-height:80px; border-radius:4px;"></div>
                            @endif
                            <input type="file" name="values_image" class="form-control @error('values_image') is-invalid @enderror" accept="image/*">
                            @error('values_image')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card border-top border-0 border-4 border-info">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Vision:</h6>
                        <p class="text-justify">
                            {{ isset($mission->vision)? $mission->vision:'' }}
                        </p>
                    </div>
                    <div class="col-md-12">
                        <h6>Mission:</h6>
                        <p class="text-justify">
                            {{ isset($mission->mission)? $mission->mission:'' }}
                        </p>
                    </div>
                    <div class="col-md-12">
                        <h6>Our Values:</h6>
                        <p class="text-justify">
                            {{ isset($mission->values_text)? $mission->values_text:'' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
