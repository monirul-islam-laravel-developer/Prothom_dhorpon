@extends('master.admin.master')
@section('title','Add Post')
@section('body')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h4>Add Post</h4></div>
            <div class="card-body">
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Category --}}
                    <div class="form-group">
                        <label>Category</label>
                        <select id="categoryName" name="category_id" class="form-control">
                            <option value="" disabled selected>---Select Category----</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- SubCategory --}}
                    <div class="form-group" id="subcategoryDiv" style="display:none;">
                        <label>SubCategory</label>
                        <select id="subcategoryName" name="subcategory_id" class="form-control">
                            <option value="" disabled selected>---Select SubCategory---</option>
                        </select>
                        @error('subcategory_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- District --}}
                    <div class="form-group" id="districtDiv" style="display:none;">
                        <label>District</label>
                        <select id="subsubCategoryName" name="dristrict_id" class="form-control">
                            <option value="" disabled selected>---Select District---</option>
                        </select>
                        @error('dristrict_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Upazila --}}
                    <div class="form-group" id="upzelaDiv" style="display:none;">
                        <label>Upazila</label>
                        <select id="upzelaName" name="upazela_id" class="form-control">
                            <option value="" disabled selected>---Select Upazila---</option>
                        </select>
                        @error('upazela_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Reporter --}}
                    <div class="form-group">
                        <label>Reporter</label>
                        <select name="reporter_id" class="form-control">
                            <option value="" disabled selected>---Select Reporter----</option>
                            @foreach($reporters as $reporter)
                                <option value="{{ $reporter->id }}" {{ old('reporter_id') == $reporter->id ? 'selected' : '' }}>
                                    {{ $reporter->name }} ({{ $reporter->designation }})
                                </option>
                            @endforeach
                        </select>
                        @error('reporter_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Title --}}
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                        @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Description --}}
                    <div class="form-group">
                        <label>Description</label>
                        <textarea id="summernote" name="description" class="form-control">{{ old('description') }}</textarea>
                        @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Image --}}
                    <div class="form-group">
                        <label for="imageInput">Upload Image</label>
                        <input type="file" id="imageInput" name="image" class="form-control" accept="image/*"  required>
                        <img id="preview" src="#" alt="Image Preview" width="400px" height="250px" style="display:none; margin-top:10px;" />
                        @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Image Caption --}}
                    <div class="form-group">
                        <label>Image Caption</label>
                        <input type="text" name="image_caption" class="form-control" value="{{ old('image_caption') }}">
                        @error('image_caption') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="imageInput">Seo Tag</label>
                        <div id="tag-container">
                            <input type="text" id="tag-input" class="tag-input" placeholder="Add Keyword Press And Enter" />
                        </div>
                        <!-- Hidden input to store the tags as comma-separated string -->
                        <input type="hidden" name="seo_tag" id="seo-tags-hidden">

                    </div>
                    <div class="col-md-12 col-xl-6">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Select News Type</h3>
                            </div>
                            <div class="card-body text-center">
                                <div class="btn-group" role="group" aria-label="News Type Selection">
                                    <!-- Left: Lead News -->
                                    <input type="radio" class="btn-check" name="news_type" id="lead" value="lead">
                                    <label class="btn btn-outline-primary px-4" for="lead">
                                        Lead News
                                    </label>

                                    <!-- Middle: None (default selected) -->
                                    <input type="radio" class="btn-check" name="news_type" id="none" value="none" checked>
                                    <label class="btn btn-outline-secondary px-4" for="none">
                                        None
                                    </label>

                                    <!-- Right: Sub Lead News -->
                                    <input type="radio" class="btn-check" name="news_type" id="sublead" value="sublead">
                                    <label class="btn btn-outline-success px-4" for="sublead">
                                        Sub Lead News
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>





                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>


    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){

            function loadSubcategories(category_id, selected_subcategory = null) {
                if(!category_id) return;

                $.get('{{ url("/posts/get-subcategories") }}/'+category_id, function(data){
                    if(data.length > 0){
                        $('#subcategoryName').html('<option value="" disabled selected>---Select SubCategory---</option>');
                        $.each(data,function(k,v){
                            var selected = (selected_subcategory == v.id) ? 'selected' : '';
                            $('#subcategoryName').append('<option value="'+v.id+'" '+selected+'>'+v.name+'</option>');
                        });
                        $('#subcategoryDiv').show();
                    } else {
                        $('#subcategoryDiv,#districtDiv,#upzelaDiv').hide();
                    }
                });
            }

            function loadDistricts(subcategory_id, selected_district = null) {
                if(!subcategory_id) return;

                $.get('{{ url("/posts/get-subsubcategories") }}/'+subcategory_id, function(data){
                    if(data.length > 0){
                        $('#subsubCategoryName').html('<option value="" disabled selected>---Select District---</option>');
                        $.each(data,function(k,v){
                            var selected = (selected_district == v.id) ? 'selected' : '';
                            $('#subsubCategoryName').append('<option value="'+v.id+'" '+selected+'>'+v.name+'</option>');
                        });
                        $('#districtDiv').show();
                    } else {
                        $('#districtDiv,#upzelaDiv').hide();
                    }
                });
            }

            function loadUpzelas(district_id, selected_upazila = null) {
                if(!district_id) return;

                $.get('{{ url("/posts/get-upzelas") }}/'+district_id, function(data){
                    if(data.length > 0){
                        $('#upzelaName').html('<option value="" disabled selected>---Select Upazila---</option>');
                        $.each(data,function(k,v){
                            var selected = (selected_upazila == v.id) ? 'selected' : '';
                            $('#upzelaName').append('<option value="'+v.id+'" '+selected+'>'+v.name+'</option>');
                        });
                        $('#upzelaDiv').show();
                    } else {
                        $('#upzelaDiv').hide();
                    }
                });
            }

            // On change events
            $('#categoryName').change(function(){
                var category_id = parseInt($(this).val());

                if(!category_id) return;

                // যদি category_id 2 হয়, treat as 9
                var effective_category = (category_id === 2) ? 9 : category_id;

                loadSubcategories(effective_category);
                $('#districtDiv,#upzelaDiv').hide();
            });

            $('#subcategoryName').change(function(){
                var subcategory_id = $(this).val();
                if(!subcategory_id) return;

                loadDistricts(subcategory_id);
                $('#upzelaDiv').hide();
            });

            $('#subsubCategoryName').change(function(){
                var district_id = $(this).val();
                if(!district_id) return;

                loadUpzelas(district_id);
            });

            // Page load old values
            var old_category = "{{ old('category_id') }}";
            var old_subcategory = "{{ old('subcategory_id') }}";
            var old_district = "{{ old('dristrict_id') }}";
            var old_upazila = "{{ old('upazela_id') }}";

            if(old_category) {
                var effective_category = (parseInt(old_category) === 2) ? 9 : old_category;
                loadSubcategories(effective_category, old_subcategory);

                if(old_subcategory) {
                    loadDistricts(old_subcategory, old_district);

                    if(old_district) {
                        loadUpzelas(old_district, old_upazila);
                    }
                }
            }
        });







    </script>

    {{-- AJAX Dependent Dropdowns --}}
{{--    <script>--}}
{{--        $(document).ready(function(){--}}

{{--            // Category -> SubCategory--}}
{{--            $('#categoryName').change(function(){--}}
{{--                var id = $(this).val();--}}
{{--                if(!id) return;--}}

{{--                $.get('{{ url("/posts/get-subcategories") }}/'+id, function(data){--}}
{{--                    if(data.length > 0){--}}
{{--                        $('#subcategoryName').html('<option value="" disabled selected>---Select SubCategory---</option>');--}}
{{--                        $.each(data,function(k,v){--}}
{{--                            $('#subcategoryName').append('<option value="'+v.id+'">'+v.name+'</option>');--}}
{{--                        });--}}
{{--                        $('#subcategoryDiv').show();--}}
{{--                        $('#districtDiv').hide();--}}
{{--                        $('#upzelaDiv').hide();--}}
{{--                    } else {--}}
{{--                        $('#subcategoryDiv,#districtDiv,#upzelaDiv').hide();--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}

{{--            // SubCategory -> District--}}
{{--            $('#subcategoryName').change(function(){--}}
{{--                var id = $(this).val();--}}
{{--                if(!id) return;--}}

{{--                $.get('{{ url("/posts/get-subsubcategories") }}/'+id, function(data){--}}
{{--                    if(data.length > 0){--}}
{{--                        $('#subsubCategoryName').html('<option value="" disabled selected>---Select District---</option>');--}}
{{--                        $.each(data,function(k,v){--}}
{{--                            $('#subsubCategoryName').append('<option value="'+v.id+'">'+v.name+'</option>');--}}
{{--                        });--}}
{{--                        $('#districtDiv').show();--}}
{{--                        $('#upzelaDiv').hide();--}}
{{--                    } else {--}}
{{--                        $('#districtDiv,#upzelaDiv').hide();--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}

{{--            // District -> Upazila--}}
{{--            $('#subsubCategoryName').change(function(){--}}
{{--                var id = $(this).val();--}}
{{--                if(!id) return;--}}

{{--                $.get('{{ url("/posts/get-upzelas") }}/'+id, function(data){--}}
{{--                    if(data.length > 0){--}}
{{--                        $('#upzelaName').html('<option value="" disabled selected>---Select Upazila---</option>');--}}
{{--                        $.each(data,function(k,v){--}}
{{--                            $('#upzelaName').append('<option value="'+v.id+'">'+v.name+'</option>');--}}
{{--                        });--}}
{{--                        $('#upzelaDiv').show();--}}
{{--                    } else {--}}
{{--                        $('#upzelaDiv').hide();--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}

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

@endsection
