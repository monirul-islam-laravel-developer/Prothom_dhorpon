@extends('master.admin.master')

@section('title')
    Notice Add
@endsection

@section('body')
    <div class="col-md-12 col-sm-12">
        <div class="card box-shadow-0">
            <div class="card-header border-bottom">
                <h4 class="card-title">Add New Category Form</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('notice.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="categoryName">Notice Title</label>
                        <input
                            type="text"
                            name="title"
                            class="form-control @error('title') is-invalid @enderror"
                            placeholder="Add New Notice"
                            value="{{ old('title') }}"
                        >

                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-2">
                        <button type="submit" class="btn btn-primary btn-sm btn-block mb-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


