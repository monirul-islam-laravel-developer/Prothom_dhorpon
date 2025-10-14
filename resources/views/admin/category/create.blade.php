@extends('master.admin.master')

@section('title')
    Category Add
@endsection

@section('body')
    <div class="col-md-12 col-sm-12">
        <div class="card box-shadow-0">
            <div class="card-header border-bottom">
                <h4 class="card-title">Add New Category Form</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="categoryName">Category Name</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="Add New Category Name"
                            value="{{ old('name') }}"
                        >

                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="categoryDescription">Category Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter Category Description" rows="4"></textarea>
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label for="imageInput">Upload Image</label>--}}
{{--                        <input type="file" id="imageInput" name="image" class="form-control" accept="image/*">--}}
{{--                    </div>--}}

{{--                    <img id="preview" src="#" alt="Image Preview" />--}}

                    <div class="form-group">
                        <label for="imageInput">Seo Tag</label>
                        <div id="tag-container">
                            <input type="text" id="tag-input" class="tag-input" placeholder="Press And Enter Input Seo tag" />
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


