@extends('master.admin.master')

@section('title')
    Notice Edit
@endsection

@section('body')
    <div class="col-md-12 col-sm-12">
        <div class="card box-shadow-0">
            <div class="card-header border-bottom">
                <h4 class="card-title">Notice Edit Form</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('notice.update',$notice->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="categoryName">Notice Title</label>
                        <input
                            type="text"
                            name="title"
                            class="form-control @error('title') is-invalid @enderror"
                            placeholder="Add New Notice"
                            value="{{$notice->title}}"
                        >

                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-2">
                        <button type="submit" class="btn btn-primary btn-sm btn-block mb-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection



