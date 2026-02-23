@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Edit Program</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('update'))
                    <div class="alert alert-success">{{ session()->get('update') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('programs.update',$data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $data->title }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Current Images</label>
                            <div class="d-flex flex-wrap gap-2 mb-2">
                                @if(isset($images) && $images->count())
                                    @foreach($images as $img)
                                    <div class="position-relative" style="display:inline-block">
                                        <img src="{{ asset('images/programs/'.$img->image) }}" style="width:90px;height:70px;object-fit:cover;border:2px solid {{ $img->is_cover ? '#0d6efd' : '#dee2e6' }}" alt="">
                                        @if($img->is_cover)<span class="badge bg-primary" style="position:absolute;top:2px;left:2px;font-size:9px">Cover</span>@endif
                                        <a href="{{ route('item.image.delete', $img->id) }}" onclick="return confirm('Delete this image?')" class="btn btn-danger btn-sm" style="position:absolute;top:2px;right:2px;padding:1px 5px;font-size:10px"><i class='bx bx-x'></i></a>
                                    </div>
                                    @endforeach
                                @elseif($data->image)
                                    <img src="{{ asset('images/programs/'.$data->image) }}" style="width:90px;height:70px;object-fit:cover" alt="">
                                @else
                                    <span class="text-muted">No images yet.</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Add More Images</label>
                            <div id="imageInputs">
                                <div class="image-input-row mb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="file" name="images[]" class="form-control img-file-input" accept="image/*" style="max-width:320px;">
                                        <button type="button" class="btn btn-sm btn-outline-danger remove-img-row" style="display:none;">✕ Remove</button>
                                        <span class="cover-badge badge bg-primary" style="font-size:10px;">1st new</span>
                                    </div>
                                    <div class="img-thumb mt-1"></div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-success mt-1" id="addImageBtn">+ Add Another Image</button>
                            <small class="text-muted d-block mt-1">New images will be appended. If no images exist yet, the <strong>first one</strong> becomes the cover.</small>
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ $data->description }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="active" {{ $data->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="completed" {{ $data->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="upcoming" {{ $data->status == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="start_date" class="form-label">Start Date (Optional)</label>
                            <input type="date" name="start_date" class="form-control" id="start_date" value="{{ $data->start_date }}">
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Update</button>
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
                                +'<span class="cover-badge badge bg-primary" style="font-size:10px;display:none;">1st new</span>'
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
