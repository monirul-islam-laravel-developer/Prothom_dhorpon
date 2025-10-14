@extends('master.admin.master')
@section('title')
    Reporter Edit
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
                <h4 class="card-title">Reporter Edit Form</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('reporter.update',$reporter->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="categoryName">Reporter Name</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="Enter your Reporter Name"
                            value="{{$reporter->name}}">

                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="categoryName">Reporter Designation</label>
                        <input
                            type="text"
                            name="designation" value="{{$reporter->designation}}" class="form-control" placeholder="Enter your Reporter Designation">
                    </div>
                    <div class="form-group">
                        <label for="categoryName">Mobile</label>
                        <input
                            type="number"
                            name="mobile" value="{{$reporter->mobile}}" class="form-control" placeholder="Enter your Reporter Mobile Number">
                    </div>
                    <div class="form-group">
                        <label for="categoryName">Nid</label>
                        <input
                            type="number"
                            name="nid" value="{{$reporter->nid}}" class="form-control" placeholder="Enter your Reporter Nid Number">
                    </div>
                    <div class="form-group">
                        <label for="categoryName">Address</label>
                        <input
                            type="text"
                            name="address" value="{{$reporter->address}}" class="form-control" placeholder="Enter your Reporter Address">
                    </div>
                    <div class="form-group">
                        <label for="categoryName">Blood Group</label>
                        <input
                            type="text"
                            name="blood_group" value="{{$reporter->blood_group}}" class="form-control" placeholder="Enter your Reporter Blood Group">
                    </div>
                    <div class="form-group">
                        <label for="categoryName">Joining Date</label>
                        <input
                            type="date"
                            name="joining_date" value="{{$reporter->joining_date}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <label for="imageInput">Upload Image</label>
                            <input type="file" id="imageInput" name="image" class="form-control" accept="image/*">
                        </div>

                        <!-- Image preview, initially showing the $category image -->
                        <img
                            id="preview"
                            src="{{ asset($reporter->image) }}"
                            alt="Image Preview"
                            style="display: {{ $reporter->image ? 'block' : 'none' }}; max-width: 300px; margin-top: 10px;"
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
                preview.src = "{{ asset($reporter->image) }}";
                preview.style.display = "{{ $reporter->image ? 'block' : 'none' }}";
            }
        });
    </script>
@endsection


