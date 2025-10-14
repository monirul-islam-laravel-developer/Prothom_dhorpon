@extends('master.admin.master')

@section('title')
    Upazila Edit
@endsection

@section('body')
    <div class="col-md-12 col-sm-12">
        <div class="card box-shadow-0">
            <div class="card-header border-bottom">
                <h4 class="card-title">Upazila Edit Form</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('upazila.update', $upazila->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Division --}}
                    <div class="form-group">
                        <label for="division_id">Division Name</label>
                        <select id="division_id" name="sub_categories_id" class="form-control" required>
                            <option value="" disabled>--- Select Division ---</option>
                            @foreach($divisions as $division)
                                <option value="{{ $division->id }}" {{ $upazila->sub_categories_id == $division->id ? 'selected' : '' }}>
                                    {{ $division->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- District --}}
                    <div class="form-group">
                        <label for="district_id">District Name</label>
                        <select id="district_id" name="subsub_categories_id" class="form-control" required>
                            <option value="">Loading Districts...</option>
                        </select>
                    </div>

                    {{-- Upazila --}}
                    <div class="form-group">
                        <label for="name">Upazila Name</label>
                        <input type="text" name="name" value="{{ $upazila->name }}" id="name" class="form-control" placeholder="Enter Upazila Name" required>
                    </div>
                    <div class="form-group">
                        <label for="categoryDescription">Dristrict Description</label>
                        <textarea class="form-control" name="description"  placeholder="Enter Upazila Description" rows="4">{{$upazila->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="imageInput">Seo Tag</label>
                        <div id="tag-container">
                            <input type="text" id="tag-input" class="tag-input" placeholder="Press And Enter Seo Input" />
                        </div>
                        <!-- Hidden input to store the tags as comma-separated string -->
                        <input type="hidden" name="seo_tag" id="seo-tags-hidden" value="{{$upazila->seo_tag}}">
                    </div>

                    <div class="col-md-12 mb-2">
                        <button type="submit" class="btn btn-primary btn-sm btn-block mb-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- 🔽 AJAX Script --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

            const divisionSelect = $('#division_id');
            const districtSelect = $('#district_id');

            // --- Function to load districts dynamically ---
            function loadDistricts(division_id, selected_district_id = null) {
                districtSelect.html('<option value="">Loading...</option>');
                if (division_id) {
                    $.ajax({
                        url: "{{ url('/get-districts') }}/" + division_id,
                        type: 'GET',
                        success: function(response) {
                            districtSelect.empty().append('<option value="">--- Select District ---</option>');
                            $.each(response, function(key, value) {
                                let selected = (selected_district_id == value.id) ? 'selected' : '';
                                districtSelect.append('<option value="' + value.id + '" ' + selected + '>' + value.name + '</option>');
                            });
                        },
                        error: function() {
                            districtSelect.html('<option value="">No District Found</option>');
                        }
                    });
                } else {
                    districtSelect.html('<option value="">--- Select District ---</option>');
                }
            }

            // --- On page load: load districts for the selected division ---
            const selectedDivision = "{{ $upazila->sub_categories_id }}";
            const selectedDistrict = "{{ $upazila->subsub_categories_id }}";
            if (selectedDivision) {
                loadDistricts(selectedDivision, selectedDistrict);
            }

            // --- When division changes: load its districts dynamically ---
            divisionSelect.on('change', function() {
                let division_id = $(this).val();
                loadDistricts(division_id);
            });

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
