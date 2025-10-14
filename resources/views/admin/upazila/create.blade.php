@extends('master.admin.master')

@section('title')
    Upazila Add
@endsection
@section('body')
    <div class="col-md-12 col-sm-12">
        <div class="card box-shadow-0">
            <div class="card-header border-bottom">
                <h4 class="card-title">Upazila Add Form</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('upazila.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Division --}}
                    <div class="form-group">
                        <label for="division_id">Division Name</label>
                        <select id="division_id" name="sub_categories_id" class="form-control" required>
                            <option value="" disabled selected>--- Select Division ---</option>
                            @foreach($divisions as $division)
                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- District --}}
                    <div class="form-group">
                        <label for="district_id">District Name</label>
                        <select id="district_id" name="subsub_categories_id" class="form-control" required>
                            <option value="">--- Select District ---</option>
                            {{-- Districts will load dynamically --}}
                        </select>
                    </div>

                    {{-- Upazila --}}
                    <div class="form-group">
                        <label for="name">Upazila Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Upazila Name" required>
                    </div>
                    <div class="form-group">
                        <label for="categoryDescription">Upazila Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter Dristrict Description" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="imageInput">Seo Tag</label>
                        <div id="tag-container">
                            <input type="text" id="tag-input" class="tag-input" placeholder="Add Keyword Press And Enter" />
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

    {{-- 🔽 AJAX Script --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#division_id').on('change', function() {
            let division_id = $(this).val();
            let districtSelect = $('#district_id');

            districtSelect.html('<option value="">Loading...</option>');

            if (division_id) {
                districtSelect.show();

                $.ajax({
                    url: "{{ url('/get-districts') }}/" + division_id,  // route helper
                    type: 'GET',
                    success: function(response) {
                        districtSelect.empty().append('<option value="">--- Select District ---</option>');
                        $.each(response, function(key, value) {
                            districtSelect.append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(error); // debug
                        districtSelect.html('<option value="">No District Found</option>');
                    }
                });
            } else {
                districtSelect.hide();
            }
        });

    </script>



@endsection





