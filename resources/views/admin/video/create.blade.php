@extends('master.admin.master')

@section('title')
    Add New Video
@endsection

@section('body')
    <div class="col-md-12 col-sm-12">
        <div class="card box-shadow-0">
            <div class="card-header border-bottom">
                <h4 class="card-title">Add New Video Form</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Video Title --}}
                    <div class="form-group">
                        <label for="videoTitle">Video Title</label>
                        <input type="text" id="videoTitle" name="title"
                            class="form-control @error('title') is-invalid @enderror"
                            placeholder="Enter Video Title Here"
                            value="{{ old('title') }}"
                        >
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Video Link --}}
                    <div class="form-group">
                        <label for="videoLink">Video Link (YouTube / Embed URL)</label>
                        <input
                            type="text"
                            id="videoLink"
                            name="link"
                            class="form-control @error('link') is-invalid @enderror"
                            placeholder="Enter video link (e.g., https://www.youtube.com/watch?v=...)"
                            value="{{ old('link') }}"
                        >
                        @error('link')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Thumbnail Upload --}}
                    <div class="form-group">
                        <label for="imageInput">Upload Thumbnail</label>
                        <input type="file" id="imageInput" name="image" class="form-control" accept="image/*">
                    </div>

                    {{-- Image Preview --}}
                    <div class="form-group text-center">
                        <img id="preview" src="#" alt="Image Preview" style="display:none; max-width: 250px; margin-top: 10px; border-radius: 10px;" />
                    </div>

                    <div class="col-md-12 mb-2">
                        <button type="submit" class="btn btn-primary btn-sm btn-block mb-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Live Image Preview --}}
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
