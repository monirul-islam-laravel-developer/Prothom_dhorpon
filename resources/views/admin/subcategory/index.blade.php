@extends('master.admin.master')
@section('title')
    All SubCategory
@endsection
@section('body')
    <!-- Row -->
    <div class="row">
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">SubCategory Index</h3>
                        <a href="{{route('subcategory.create')}}" class="btn btn-primary">Add SubCategory</a>
                    </div>
                    <!-- Rest of your card body here -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="editable-responsive-table" class="table editable-table table-nowrap table-bordered table-edit wp-100">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                {{--                                <th>Image</th>--}}
                                <th>Status</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subcategories as $subcategory)
                                <tr data-id="1">
                                    <td data-field="id">{{$loop->iteration}}</td>
                                    <td data-field="age">{{$subcategory->name}}</td>
                                    <td data-field="age">{{$subcategory->category->name}}</td>
                                    <td data-field="gender">{{$subcategory->description}}</td>
                                    {{--                                    <td data-field="image">--}}
                                    {{--                                        <img src="{{$subcategory->image}}" height="60" width="100">--}}
                                    {{--                                    </td>--}}

                                    <td style="width: 100px">
                                        @if($subcategory->status==1)
                                            <a href="{{route('subcategory.show',$subcategory->id)}}" class="btn btn-primary">Active</a>
                                        @else
                                            <a href="{{route('subcategory.show',$subcategory->id)}}" class="btn btn-danger">Inactive</a>
                                        @endif

                                    </td>
                                    <td style="width: 100px">
                                        <a href="{{route('subcategory.edit',$subcategory->id)}}" class="btn btn-primary" title="Edit">
                                            <i class="fe fe-edit"></i>
                                        </a>
                                        <form action="{{ route('subcategory.destroy',$subcategory->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this category?')">
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
    <!-- End Row -->
@endsection

