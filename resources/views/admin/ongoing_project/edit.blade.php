@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Edit Ongoing Project</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('update'))
                    <div class="alert alert-success">{{ session()->get('update') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('project.update',$project->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $project->title }}">
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
                                        <img src="{{ asset('images/project/'.$img->image) }}" style="width:90px;height:70px;object-fit:cover;border:2px solid {{ $img->is_cover ? '#0d6efd' : '#dee2e6' }}" alt="">
                                        @if($img->is_cover)<span class="badge bg-primary" style="position:absolute;top:2px;left:2px;font-size:9px">Cover</span>@endif
                                        <a href="{{ route('item.image.delete', $img->id) }}" onclick="return confirm('Delete this image?')" class="btn btn-danger btn-sm" style="position:absolute;top:2px;right:2px;padding:1px 5px;font-size:10px"><i class='bx bx-x'></i></a>
                                    </div>
                                    @endforeach
                                @elseif($project->image)
                                    <img src="{{ asset('images/project/'.$project->image) }}" style="width:90px;height:70px;object-fit:cover" alt="">
                                @else
                                    <span class="text-muted">No images yet.</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Add More Images</label>
                            <div class="mb-1">
                                <input type="file" name="images[]" id="img" multiple accept="image/*" style="display:none">
                                <button type="button" class="btn btn-outline-secondary" onclick="document.getElementById('img').click()">Choose Files</button>
                            </div>
                            <div id="imgPreview" class="d-flex flex-wrap gap-3 mt-3"></div>
                        </div>
                        <div class="col-md-12">
                            <label for="donor" class="form-label">Donor (optional)</label>
                            <input type="text" name="donor" class="form-control @error('donor') is-invalid @enderror" id="donor" value="{{ $project->donor ?? '' }}">
                            @error('donor')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="3">
                                {{ $project->description }}
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
                        var input   = document.getElementById('img');
                        var preview = document.getElementById('imgPreview');
                        var fileArr = [];
                        input.addEventListener('change', function(){
                            Array.from(this.files).forEach(function(f){ fileArr.push(f); });
                            this.value = '';
                            render();
                        });
                        function render(){
                            preview.innerHTML = '';
                            fileArr.forEach(function(file, i){
                                var reader = new FileReader();
                                reader.onload = (function(f, idx){
                                    return function(ev){
                                        var card = document.createElement('div');
                                        card.style.cssText = 'position:relative;width:150px;';
                                        var imgEl = document.createElement('img');
                                        imgEl.src = ev.target.result;
                                        imgEl.style.cssText = 'width:150px;height:120px;object-fit:cover;border-radius:4px;border:2px solid '+(idx===0?'#0d6efd':'#ccc')+';display:block;';
                                        var num = document.createElement('span');
                                        num.textContent = idx + 1;
                                        num.style.cssText = 'position:absolute;top:5px;left:5px;background:rgba(0,0,0,0.7);color:#fff;border-radius:3px;padding:1px 6px;font-size:12px;font-weight:bold;';
                                        var del = document.createElement('button');
                                        del.type = 'button'; del.innerHTML = '&times;';
                                        del.style.cssText = 'position:absolute;bottom:25px;left:5px;background:#fff;border:1px solid #aaa;width:19px;height:19px;cursor:pointer;font-size:14px;line-height:1;padding:0;border-radius:2px;';
                                        del.onclick = (function(n){ return function(){ fileArr.splice(n,1); render(); }; })(idx);
                                        var nm = document.createElement('div');
                                        nm.textContent = f.name.length>18 ? f.name.substring(0,15)+'...' : f.name;
                                        nm.style.cssText = 'font-size:11px;color:#555;margin-top:3px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;';
                                        card.appendChild(imgEl); card.appendChild(num); card.appendChild(del); card.appendChild(nm);
                                        preview.appendChild(card);
                                    };
                                })(file, i);
                                reader.readAsDataURL(file);
                            });
                            try{ var dt=new DataTransfer(); fileArr.forEach(function(f){dt.items.add(f);}); input.files=dt.files; }catch(e){}
                        }
                    })();
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
