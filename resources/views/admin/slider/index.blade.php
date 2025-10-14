@extends('master.admin.master')
@section('title')
    All Slider
@endsection

@section('body')
    <!-- Row -->
    <div class="row">
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Slider Index</h3>
                        <a href="{{route('slider.create')}}" class="btn btn-primary">Add Slider</a>
                    </div>
                    <!-- Rest of your card body here -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="editable-responsive-table" class="table editable-table table-nowrap table-bordered table-edit wp-100">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $slider)
                                <tr data-id="1">
                                    <td data-field="id">{{$loop->iteration}}</td>
                                    <td data-field="age">{{$slider->title}}</td>
                                    <td data-field="image">
                                        <img src="{{$slider->image}}" height="60" width="100">
                                    </td>

                                    <td style="width: 100px">
                                        @if($slider->status==1)
                                            <a href="{{route('slider.show',$slider->id)}}" class="btn btn-primary">Active</a>
                                        @else
                                            <a href="{{route('slider.show',$slider->id)}}" class="btn btn-danger">Inactive</a>
                                        @endif

                                    </td>
                                    <td style="width: 100px">
                                        <a href="{{route('slider.edit',$slider->id)}}" class="btn btn-primary" title="Edit">
                                            <i class="fe fe-edit"></i>
                                        </a>
                                        <form action="{{ route('slider.destroy', $slider->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this Slider?')">
                                                <i class="fe fe-delete"></i>
                                            </button>
                                        </form>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

