@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="mb-1 fw-bold">Edit Strategic Plan</h4>
                <p class="text-muted mb-0">Update strategic plan information</p>
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

                <form class="row g-3" action="{{ route('strategic_plans.update', $strategicPlan->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="col-md-12">
                        <label for="title" class="form-label fw-semibold">Title<span class="text-danger">*</span></label>
                        <input type="text" 
                               name="title" 
                               id="title" 
                               class="form-control shadow-sm @error('title') is-invalid @enderror" 
                               value="{{ $strategicPlan->title }}">
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
                                  placeholder="Enter Description (optional)">{{ old('description', $strategicPlan->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="image" class="form-label fw-semibold">Image</label>
                        <input type="file" 
                               name="image" 
                               id="image" 
                               class="form-control shadow-sm @error('image') is-invalid @enderror"
                               accept="image/*">
                        @if (!empty($strategicPlan->image))
                            <div class="mt-3 p-3 bg-light rounded">
                                <small class="text-muted d-block mb-2">Current Image:</small>
                                <img src="{{ asset('images/strategic_plans/images/'.$strategicPlan->image) }}" 
                                     alt="Strategic Plan Image" 
                                     width="120" 
                                     class="rounded shadow-sm">
                            </div>
                        @else
                            <div class="form-text text-muted">No image uploaded yet</div>
                        @endif
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="pdf_file" class="form-label fw-semibold">Upload PDF</label>
                        <input type="file" 
                               name="pdf_file" 
                               id="pdf_file" 
                               class="form-control shadow-sm @error('pdf_file') is-invalid @enderror"
                               accept="application/pdf">
                        @if (!empty($strategicPlan->pdf_file))
                            <div class="mt-2 p-2 bg-light rounded">
                                <small class="text-success">
                                    <i class="bx bx-file-pdf"></i> Current File: {{ $strategicPlan->pdf_file }}
                                </small>
                            </div>
                        @else
                            <div class="form-text text-danger">No PDF uploaded yet (PDF is required)</div>
                        @endif
                        @error('pdf_file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 pt-3">
                        <button class="btn btn-primary shadow-sm px-4" type="submit">
                            <i class="bx bx-check me-1"></i> Update
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
