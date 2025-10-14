@extends('master.admin.master')

@section('title')
    SubCategory Add
@endsection
@section('body')
    <div class="col-md-12 col-sm-12">
        <div class="card box-shadow-0">
            <div class="card-header border-bottom">
                <h4 class="card-title">Sub Category Add Form</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('subcategory.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="SubcategoryName">SubCategory Name</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="Enter your SubCategory Name"
                            value="{{ old('name') }}"
                        >

                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="categoryName">Category Name</label>
                        <select id="categoryName" name="category_id" class="form-control">
                            <option value="" disabled selected>------- Select Category Name -------</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="categoryDescription">Category Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter your Category Description" rows="4"></textarea>
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label for="imageInput">Upload Image</label>--}}
{{--                        <input type="file" id="imageInput" name="image" class="form-control" accept="image/*">--}}
{{--                    </div>--}}

{{--                    <img id="preview" src="#" alt="Image Preview" />--}}

                    <div class="form-group">
                        <label for="imageInput">SEO Tag</label>
                        <div id="tag-container">
                            <input type="text" id="tag-input" class="tag-input" placeholder="Add a keyword and press Enter" />
                        </div>
                        <!-- Hidden input to store the tags as comma-separated string -->
                        <input type="hidden" name="seo_tag" id="seo-tags-hidden">

                    </div>

                    <div class="col-md-12 mb-2">
                        <button type="submit" class="btn btn-primary btn-sm btn-block mb-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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



