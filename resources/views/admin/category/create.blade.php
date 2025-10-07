@extends('master.admin.master')

@section('title')
    Category Add
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
                <h4 class="card-title">Category Add Form</h4>
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
                            placeholder="Enter your Category Name"
                            value="{{ old('name') }}"
                        >

                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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

    <script>
        const input = document.getElementById('tag-input');
        const container = document.getElementById('tag-container');
        const hiddenInput = document.getElementById('seo-tags-hidden');

        const tags = [];

        function updateHiddenInput() {
            hiddenInput.value = tags.join(',');
        }

        function createTagElement(text) {
            const tag = document.createElement('div');
            tag.className = 'tag';
            tag.textContent = text;

            const remove = document.createElement('span');
            remove.className = 'remove';
            remove.textContent = '×';
            remove.onclick = () => {
                const index = tags.indexOf(text);
                if (index > -1) {
                    tags.splice(index, 1);
                    updateHiddenInput();
                }
                tag.remove();
            };

            tag.appendChild(remove);
            return tag;
        }

        input.addEventListener('keydown', function (event) {
            if (event.key === 'Enter' || event.key === ',') {
                event.preventDefault();
                const text = input.value.trim();
                if (text && !tags.includes(text)) {
                    tags.push(text);
                    const tag = createTagElement(text);
                    container.insertBefore(tag, input);
                    input.value = '';
                    updateHiddenInput();
                }
            }
        });
    </script>



@endsection


