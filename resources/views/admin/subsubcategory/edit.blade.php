@extends('master.admin.master')

@section('title')
    Dristrict Edit
@endsection
@section('body')
    <div class="col-md-12 col-sm-12">
        <div class="card box-shadow-0">
            <div class="card-header border-bottom">
                <h4 class="card-title">Dristrict  Edit Form</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('subsubcategory.update',$subsubcategory->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="categoryName">Division</label>
                        <select id="categoryName" name="subcategory_id" class="form-control">
                            <option value="" disabled selected>---Select Division---</option>
                            @foreach($subcategories9 as $subcategory9)
                                <option value="{{ $subcategory9->id }}"
                                    {{ $subcategory9->id == $subsubcategory->subcategory_id ? 'selected' : '' }}>
                                    {{ $subcategory9->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="SubcategoryName">Dristrict Name</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="Enter Dristrict Name"
                            value="{{$subsubcategory->name}}"
                        >

                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="categoryDescription">Dristrict Description</label>
                        <textarea class="form-control" name="description"  placeholder="Enter Dristrict Description" rows="4">{{$subsubcategory->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="imageInput">Seo Tag</label>
                        <div id="tag-container">
                            <input type="text" id="tag-input" class="tag-input" placeholder="Press And Enter Seo Input" />
                        </div>
                        <!-- Hidden input to store the tags as comma-separated string -->
                        <input type="hidden" name="seo_tag" id="seo-tags-hidden" value="{{$subsubcategory->seo_tag}}">
                    </div>

                    <div class="col-md-12 mb-2">
                        <button type="submit" class="btn btn-primary btn-sm btn-block mb-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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





