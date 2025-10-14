@extends('master.admin.master')

@section('title')
    Slider Add
@endsection
<style>
    #tag-container {
        display: flex;
        flex-wrap: wrap;
        border: 1px solid #ccc;
        padding: 5px;
    }

    .tag {
        background-color: #e2e2e2;
        border-radius: 3px;
        padding: 5px 10px;
        margin: 3px;
        display: flex;
        align-items: center;
    }

    .tag .remove {
        margin-left: 8px;
        color: #555;
        cursor: pointer;
        font-weight: bold;
    }

    #tag-input {
        border: none;
        outline: none;
        flex: 1;
        padding: 5px;
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
                <h4 class="card-title">Slider Add Form</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="categoryName">Slider Title</label>
                        <input
                            type="text"
                            name="title"
                            class="form-control @error('title') is-invalid @enderror"
                            placeholder="Enter Slider Title"
                            value="{{ old('title') }}">

                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="imageInput">Upload Image</label>
                        <input type="file" id="imageInput" name="image" class="form-control" accept="image/*">
                    </div>

                    <img id="preview" src="#" alt="Image Preview" />

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




