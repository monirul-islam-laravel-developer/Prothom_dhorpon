@extends('master.admin.master')

@section('title')
    Dristrict Add
@endsection
@section('body')
    <div class="col-md-12 col-sm-12">
        <div class="card box-shadow-0">
            <div class="card-header border-bottom">
                <h4 class="card-title">Dristrict Add Form</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('subsubcategory.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="categoryName">Division Name</label>
                        <select id="categoryName" name="subcategory_id" class="form-control">
                            <option value="" disabled selected>---Select Your Division---</option>
                            @foreach($subcategories9 as $subcategory9)
                                <option value="{{ $subcategory9->id }}">{{ $subcategory9->name }}</option>
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
                            value="{{ old('name') }}"
                        >

                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="categoryDescription">Dristrict Description</label>
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



@endsection




