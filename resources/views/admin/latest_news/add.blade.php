@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Add Latest News</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="" placeholder="Enter News Title">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Images <span class="text-danger">*</span></label>
                            @error('images')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            @error('images.*')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div id="imageInputs">
                                <div class="image-input-row mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="file" name="images[]" class="form-control img-file-input" accept="image/*" style="max-width:320px;">
                                        <button type="button" class="btn btn-sm btn-outline-danger remove-img-row" style="display:none;">✕ Remove</button>
                                        <span class="cover-badge badge bg-primary" style="font-size:10px;">Cover</span>
                                    </div>
                                    <div class="img-thumb mt-1"></div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-success mt-1" id="addImageBtn">+ Add Another Image</button>
                            <small class="text-muted d-block mt-1">The <strong>first image</strong> will be the cover image.</small>
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="3">

                            </textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                    <script>
                    (function(){
                        var container = document.getElementById('imageInputs');
                        var addBtn    = document.getElementById('addImageBtn');
                        function updateUI() {
                            container.querySelectorAll('.image-input-row').forEach(function(row, idx){
                                var removeBtn  = row.querySelector('.remove-img-row');
                                var coverBadge = row.querySelector('.cover-badge');
                                var img        = row.querySelector('.img-thumb img');
                                removeBtn.style.display  = idx === 0 ? 'none' : '';
                                coverBadge.style.display = idx === 0 ? '' : 'none';
                                if (img) img.style.borderColor = idx === 0 ? '#0d6efd' : '#dee2e6';
                            });
                        }
                        container.addEventListener('change', function(e){
                            if (!e.target.classList.contains('img-file-input')) return;
                            var row   = e.target.closest('.image-input-row');
                            var thumb = row.querySelector('.img-thumb');
                            var file  = e.target.files[0];
                            if (file) {
                                var reader = new FileReader();
                                reader.onload = function(ev){
                                    thumb.innerHTML = '<img src="'+ev.target.result+'" style="width:90px;height:70px;object-fit:cover;border:2px solid #dee2e6;border-radius:4px;">';
                                    updateUI();
                                };
                                reader.readAsDataURL(file);
                            } else {
                                thumb.innerHTML = '';
                            }
                        });
                        container.addEventListener('click', function(e){
                            if (e.target.closest('.remove-img-row')){
                                e.target.closest('.image-input-row').remove();
                                updateUI();
                            }
                        });
                        addBtn.addEventListener('click', function(){
                            var newRow = document.createElement('div');
                            newRow.className = 'image-input-row mb-2';
                            newRow.innerHTML = '<div class="d-flex align-items-center gap-2">'
                                +'<input type="file" name="images[]" class="form-control img-file-input" accept="image/*" style="max-width:320px;">'
                                +'<button type="button" class="btn btn-sm btn-outline-danger remove-img-row">✕ Remove</button>'
                                +'<span class="cover-badge badge bg-primary" style="font-size:10px;display:none;">Cover</span>'
                                +'</div>'
                                +'<div class="img-thumb mt-1"></div>';
                            container.appendChild(newRow);
                            updateUI();
                        });
                    })();
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
