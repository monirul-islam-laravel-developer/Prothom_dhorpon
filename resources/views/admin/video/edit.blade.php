@extends('master.admin.master')
@section('title')
    Category Edit
@endsection

@section('body')
    <div class="col-md-12 col-sm-12">
        <div class="card box-shadow-0">
            <div class="card-header border-bottom">
                <h4 class="card-title">Video Edit form</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('video.update',$video->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="videoTitle">Video Title</label>
                        <input type="text" id="videoTitle" name="title"
                               class="form-control @error('title') is-invalid @enderror"
                               placeholder="Enter Video Title Here"
                               value="{{$video->title}}"
                        >
                        @error('title')
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
                                                src="{{ asset($video->image) }}"
                                                alt="Image Preview"
                                                style="display: {{ $video->image ? 'block' : 'none' }}; max-width: 300px; margin-top: 10px;"
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
                preview.src = "{{ asset($video->image) }}";
                preview.style.display = "{{ $video->image ? 'block' : 'none' }}";
            }
        });
    </script>





@endsection


