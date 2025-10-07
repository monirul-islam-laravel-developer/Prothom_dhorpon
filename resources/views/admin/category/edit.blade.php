@extends('master.admin.master')
@section('title')
    Category Edit
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
                <h4 class="card-title">Category Edit Form</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="categoryName">Category Name</label>
                        <input type="text" name="name" class="form-control" value="{{$category->name}}" placeholder="Enter your Category Name">
                    </div>
                    <div class="form-group">
                        <label for="categoryDescription">Category Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter your Category Description" rows="4">{{$category->description}}</textarea>
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="imageInput">Upload Image</label>--}}
{{--                            <input type="file" id="imageInput" name="image" class="form-control" accept="image/*">--}}
{{--                        </div>--}}

{{--                        <!-- Image preview, initially showing the $category image -->--}}
{{--                        <img--}}
{{--                            id="preview"--}}
{{--                            src="{{ asset($category->image) }}"--}}
{{--                            alt="Image Preview"--}}
{{--                            style="display: {{ $category->image ? 'block' : 'none' }}; max-width: 300px; margin-top: 10px;"--}}
{{--                        >--}}

                    <div class="form-group">
                        <label for="imageInput">SEO Tag</label>
                        <div id="tag-container">
                            <input type="text" id="tag-input" class="tag-input" placeholder="Add a keyword and press Enter" />
                        </div>
                        <!-- Hidden input to store the tags as comma-separated string -->
                        <input type="hidden" name="seo_tag" id="seo-tags-hidden" value="{{$category->seo_tag}}">
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
                // Reset to original image if no valid file is selected
                preview.src = "{{ asset($category->image) }}";
                preview.style.display = "{{ $category->image ? 'block' : 'none' }}";
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

        // Handle adding new tag
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

        // === Load existing tags from hidden input ===
        window.addEventListener('DOMContentLoaded', () => {
            const existingTags = hiddenInput.value.split(',').map(t => t.trim()).filter(t => t);
            existingTags.forEach(tagText => {
                if (!tags.includes(tagText)) {
                    tags.push(tagText);
                    const tag = createTagElement(tagText);
                    container.insertBefore(tag, input);
                }
            });
        });
    </script>




@endsection


