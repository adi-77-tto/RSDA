@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Add Program</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('programs.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter Program Title">
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
                            <div class="mb-1">
                                <input type="file" name="images[]" id="img" multiple accept="image/*" style="display:none">
                                <button type="button" class="btn btn-outline-secondary" onclick="document.getElementById('img').click()">Choose Files</button>
                                <small class="text-muted ms-2">First image will be the cover.</small>
                            </div>
                            <div id="imgPreview" class="d-flex flex-wrap gap-3 mt-3"></div>
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="5"></textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="active">Active</option>
                                <option value="completed">Completed</option>
                                <option value="upcoming">Upcoming</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="start_date" class="form-label">Start Date (Optional)</label>
                            <input type="date" name="start_date" class="form-control" id="start_date">
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
