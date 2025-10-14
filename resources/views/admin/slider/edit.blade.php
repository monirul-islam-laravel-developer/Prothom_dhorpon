@extends('master.admin.master')
@section('title')
    Slider Edit
@endsection
<style>
    .tag {
        display: inline-block;
        background-color: #e2e6ea;
        border-radius: 4px;
        padding: 4px 8px;
        margin: 2px;
        font-size: 14px;
        position: relative;
    }

    .remove {
        margin-left: 8px;
        color: red;
        cursor: pointer;
    }

    .tag-input {
        border: none;
        outline: none;
        min-width: 120px;
    }

    #tag-container {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        border: 1px solid #ccc;
        padding: 5px;
        border-radius: 4px;
    }
</style>
<style>
    #preview {
        max-width: 100%;
        max-height: 300px;
        margin-top: 10px;
        display: none;
        border: 1px solid #ccc;
        padding: 5px;
    }
</style>
@section('body')
    <div class="col-md-12 col-sm-12">
        <div class="card box-shadow-0">
            <div class="card-header border-bottom">
                <h4 class="card-title">Slider Edit Form</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('slider.update',$slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="categoryName">Title</label>
                        <input
                            type="text"
                            name="title"
                            class="form-control @error('title') is-invalid @enderror"
                            placeholder="Enter Slider Title"
                            value="{{$slider->title}}">

                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <label for="imageInput">Upload Image</label>
                            <input type="file" id="imageInput" name="image" class="form-control" accept="image/*">
                        </div>

                        <!-- Image preview, initially showing the $category image -->
                        <img
                            id="preview"
                            src="{{ asset($slider->image) }}"
                            alt="Image Preview"
                            style="display: {{ $slider->image ? 'block' : 'none' }}; max-width: 300px; margin-top: 10px;"
                        >

                        <div class="col-md-12 mb-2">
                            <button type="submit" class="btn btn-primary btn-sm btn-block mb-2">Update</button>
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
                // Reset to original image if no valid file is selected
                preview.src = "{{ asset($slider->image) }}";
                preview.style.display = "{{ $slider->image ? 'block' : 'none' }}";
            }
        });
    </script>
@endsection



