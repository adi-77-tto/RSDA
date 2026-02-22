@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="mb-1 fw-bold">Add Strategic Plan</h4>
                <p class="text-muted mb-0">Create a new strategic plan document</p>
            </div>
            <a href="{{ route('strategic_plans.index') }}" class="btn btn-outline-secondary">
                <i class="bx bx-arrow-back"></i> Back to List
            </a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="bx bx-check-circle me-2"></i>{{ session()->get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form class="row g-3" action="{{ route('strategic_plans.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="col-md-12">
                        <label for="title" class="form-label fw-semibold">Title<span class="text-danger">*</span></label>
                        <input type="text" 
                               name="title" 
                               id="title" 
                               class="form-control shadow-sm @error('title') is-invalid @enderror" 
                               placeholder="Enter Strategic Plan Title" 
                               value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="description" class="form-label fw-semibold">Description</label>
                        <textarea name="description" 
                                  id="description" 
                                  rows="4" 
                                  class="form-control shadow-sm @error('description') is-invalid @enderror" 
                                  placeholder="Enter Description (optional)">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="image" class="form-label fw-semibold">Image<span class="text-danger">*</span></label>
                        <input type="file" 
                               name="image" 
                               id="image" 
                               class="form-control shadow-sm @error('image') is-invalid @enderror"
                               accept="image/*">
                        <div class="form-text">
                            <i class="bx bx-info-circle"></i> Maximum size: 2 MB. Supported formats: JPG, PNG, JPEG, GIF, WEBP
                        </div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="pdf_file" class="form-label fw-semibold">Upload PDF<span class="text-danger">*</span></label>
                        <input type="file" 
                               name="pdf_file" 
                               id="pdf_file" 
                               class="form-control shadow-sm @error('pdf_file') is-invalid @enderror"
                               accept="application/pdf">
                        <div class="form-text">
                            <i class="bx bx-info-circle"></i> Maximum size: 10 MB
                        </div>
                        @error('pdf_file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 pt-3">
                        <button class="btn btn-primary shadow-sm px-4" type="submit">
                            <i class="bx bx-check me-1"></i> Submit
                        </button>
                        <a href="{{ route('strategic_plans.index') }}" class="btn btn-secondary shadow-sm px-4">
                            <i class="bx bx-x me-1"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
