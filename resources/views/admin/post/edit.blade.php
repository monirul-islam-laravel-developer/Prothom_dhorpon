@extends('master.admin.master')
@section('title','Edit Post')
@section('body')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h4>Edit Post</h4></div>
            <div class="card-body">
                <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Category --}}
                    <div class="form-group">
                        <label>Category</label>
                        <select id="categoryName" name="category_id" class="form-control">
                            <option value="" disabled>---Select Category----</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- SubCategory --}}
                    <div class="form-group" id="subcategoryDiv" style="{{ $post->subcategory_id ? 'display:block;' : 'display:none;' }}">
                        <label>SubCategory</label>
                        <select id="subcategoryName" name="subcategory_id" class="form-control">
                            <option value="" disabled>---Select SubCategory---</option>
                            @if($post->subcategory_id)
                                @foreach(App\Models\SubCategory::where('category_id', $post->category_id)->get() as $subcat)
                                    <option value="{{ $subcat->id }}" {{ $post->subcategory_id == $subcat->id ? 'selected' : '' }}>
                                        {{ $subcat->name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @error('subcategory_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- District --}}
                    <div class="form-group" id="districtDiv" style="{{ $post->dristrict_id ? 'display:block;' : 'display:none;' }}">
                        <label>District</label>
                        <select id="subsubCategoryName" name="dristrict_id" class="form-control">
                            <option value="" disabled>---Select District----</option>
                            @if($post->dristrict_id)
                                @foreach(App\Models\SubsubCategory::where('subcategory_id',$post->subcategory_id)->get() as $district)
                                    <option value="{{ $district->id }}" {{ $post->dristrict_id == $district->id ? 'selected' : '' }}>
                                        {{ $district->name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @error('dristrict_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Upazila --}}
                    <div class="form-group" id="upzelaDiv" style="{{ $post->upazela_id ? 'display:block;' : 'display:none;' }}">
                        <label>Upazila</label>
                        <select id="upzelaName" name="upazela_id" class="form-control">
                            <option value="" disabled>---Select Upazila---</option>
                            @if($post->upazela_id)
                                @foreach(App\Models\Upazila::where('subsub_categories_id', $post->dristrict_id)->get() as $upz)
                                    <option value="{{ $upz->id }}" {{ $post->upazela_id == $upz->id ? 'selected' : '' }}>
                                        {{ $upz->name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @error('upazela_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Reporter --}}
                    <div class="form-group">
                        <label>Reporter</label>
                        <select name="reporter_id" class="form-control">
                            <option value="" disabled>---Select Reporter----</option>
                            @foreach($reporters as $reporter)
                                <option value="{{ $reporter->id }}" {{ $post->reporter_id == $reporter->id ? 'selected' : '' }}>
                                    {{ $reporter->name }} ({{ $reporter->designation }})
                                </option>
                            @endforeach
                        </select>
                        @error('reporter_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Title --}}
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}">
                        @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Description --}}
                    <div class="form-group">
                        <label>Description</label>
                        <textarea id="summernote" name="description" class="form-control">{{ old('description', $post->description) }}</textarea>
                        @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Image --}}
                    <div class="form-group">
                        <label for="imageInput">Upload Image</label>
                        <input type="file" id="imageInput" name="image" class="form-control" accept="image/*">
                        @if($post->image)
                            <img id="preview" src="{{ asset($post->image) }}" alt="Image Preview" width="400px" height="250px" style="display:block; margin-top:10px;" />
                        @else
                            <img id="preview" src="#" alt="Image Preview" width="400px" height="250px" style="display:none; margin-top:10px;" />
                        @endif
                        @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Image Caption --}}
                    <div class="form-group">
                        <label>Image Caption</label>
                        <input type="text" name="image_caption" class="form-control" value="{{ old('image_caption', $post->image_caption) }}">
                        @error('image_caption') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- SEO Tag --}}
                    <div class="form-group">
                        <label>Seo Tag</label>
                        <div id="tag-container">
                            <input type="text" id="tag-input" class="tag-input" placeholder="Press And Enter Seo Input" />
                        </div>
                        <input type="hidden" name="seo_tag" id="seo-tags-hidden" value="{{$post->seo_tag}}">
                    </div>

                    {{-- News Type --}}
                    <div class="col-md-12 col-xl-6">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Select News Type</h3>
                            </div>
                            <div class="card-body text-center">
                                <div class="btn-group" role="group" aria-label="News Type Selection">
                                    <input type="radio" class="btn-check" name="news_type" id="lead" value="lead" {{ $post->lead_news ? 'checked' : '' }}>
                                    <label class="btn btn-outline-primary px-4" for="lead">Lead News</label>

                                    <input type="radio" class="btn-check" name="news_type" id="none" value="none" {{ !$post->lead_news && !$post->sublead_news ? 'checked' : '' }}>
                                    <label class="btn btn-outline-secondary px-4" for="none">None</label>

                                    <input type="radio" class="btn-check" name="news_type" id="sublead" value="sublead" {{ $post->sublead_news ? 'checked' : '' }}>
                                    <label class="btn btn-outline-success px-4" for="sublead">Sub Lead News</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </form>
            </div>
        </div>
    </div>

    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- Ajax Dependent Dropdowns --}}
    <script>
        $(document).ready(function(){

            function hideAllBelow(level) {
                switch(level){
                    case 'category':
                        $('#subcategoryDiv,#districtDiv,#upzelaDiv').hide();
                        break;
                    case 'subcategory':
                        $('#districtDiv,#upzelaDiv').hide();
                        break;
                    case 'district':
                        $('#upzelaDiv').hide();
                        break;
                }
            }

            // Hide empty divs on page load
            if($('#subcategoryName option').length <= 1) hideAllBelow('category');
            if($('#subsubCategoryName option').length <= 1) hideAllBelow('subcategory');
            if($('#upzelaName option').length <= 1) hideAllBelow('district');

            // Category -> SubCategory
            $('#categoryName').change(function(){
                var id = parseInt($(this).val());
                if(!id) return hideAllBelow('category');

                // Treat category_id 2 as 9
                var effective_id = (id === 2) ? 9 : id;

                $.get('{{ url("/posts/get-subcategories") }}/'+effective_id, function(data){
                    if(data.length > 0){
                        $('#subcategoryName').html('<option value="" disabled selected>---Select SubCategory---</option>');
                        $.each(data,function(k,v){
                            $('#subcategoryName').append('<option value="'+v.id+'">'+v.name+'</option>');
                        });
                        $('#subcategoryDiv').show();
                        hideAllBelow('subcategory');
                    } else {
                        hideAllBelow('category');
                    }
                });
            });

            // SubCategory -> District
            $('#subcategoryName').change(function(){
                var id = $(this).val();
                if(!id) return hideAllBelow('subcategory');

                $.get('{{ url("/posts/get-subsubcategories") }}/'+id, function(data){
                    if(data.length > 0){
                        $('#subsubCategoryName').html('<option value="" disabled selected>---Select District---</option>');
                        $.each(data,function(k,v){
                            $('#subsubCategoryName').append('<option value="'+v.id+'">'+v.name+'</option>');
                        });
                        $('#districtDiv').show();
                        hideAllBelow('district');
                    } else {
                        hideAllBelow('subcategory');
                    }
                });
            });

            // District -> Upazila
            $('#subsubCategoryName').change(function(){
                var id = $(this).val();
                if(!id) return hideAllBelow('district');

                $.get('{{ url("/posts/get-upzelas") }}/'+id, function(data){
                    if(data.length > 0){
                        $('#upzelaName').html('<option value="" disabled selected>---Select Upazila---</option>');
                        $.each(data,function(k,v){
                            $('#upzelaName').append('<option value="'+v.id+'">'+v.name+'</option>');
                        });
                        $('#upzelaDiv').show();
                    } else {
                        hideAllBelow('district');
                    }
                });
            });

        });

    </script>

    {{-- Image Preview --}}
    <script>
        document.getElementById('imageInput').addEventListener('change', function (event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview');
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                preview.src = "#";
                preview.style.display = 'none';
            }
        });
    </script>

    {{-- SEO Tag --}}
    <script>
        const input = document.getElementById('tag-input');
        const container = document.getElementById('tag-container');
        const hiddenInput = document.getElementById('seo-tags-hidden');

        const tags = [];

        // Load existing tags
        window.addEventListener('DOMContentLoaded', () => {
            const existingTags = hiddenInput.value.split(',').map(t => t.trim()).filter(t => t);
            existingTags.forEach(tagText => {
                if(!tags.includes(tagText)){
                    tags.push(tagText);
                    const tag = document.createElement('div');
                    tag.className = 'tag';
                    tag.textContent = tagText;
                    const remove = document.createElement('span');
                    remove.className = 'remove';
                    remove.textContent = '×';
                    remove.onclick = () => {
                        tags.splice(tags.indexOf(tagText), 1);
                        hiddenInput.value = tags.join(',');
                        tag.remove();
                    };
                    tag.appendChild(remove);
                    container.insertBefore(tag, input);
                }
            });
        });

        // Add new tags
        input.addEventListener('keydown', function(event){
            if(event.key === 'Enter' || event.key === ','){
                event.preventDefault();
                const text = input.value.trim();
                if(text && !tags.includes(text)){
                    tags.push(text);
                    const tag = document.createElement('div');
                    tag.className = 'tag';
                    tag.textContent = text;
                    const remove = document.createElement('span');
                    remove.className = 'remove';
                    remove.textContent = '×';
                    remove.onclick = () => {
                        tags.splice(tags.indexOf(text), 1);
                        hiddenInput.value = tags.join(',');
                        tag.remove();
                    };
                    tag.appendChild(remove);
                    container.insertBefore(tag, input);
                    input.value = '';
                    hiddenInput.value = tags.join(',');
                }
            }
        });
    </script>

@endsection
