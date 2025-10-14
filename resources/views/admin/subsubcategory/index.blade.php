@extends('master.admin.master')
@section('title')
    All SubSubCategory
@endsection

@section('body')
    <!-- Row -->
    <div class="row">
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">All Dristrict List</h3>
                        <a href="{{route('subsubcategory.create')}}" class="btn btn-primary">Add New Dristrict</a>
                    </div>
                    <!-- Rest of your card body here -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="editable-responsive-table" class="table editable-table table-nowrap table-bordered table-edit wp-100">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Division Name</th>
                                <th>Dristrict Name</th>
                                <th>Status</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subsubcategories as $subsubcategory)
                                <tr data-id="1">
                                    <td data-field="id">{{$loop->iteration}}</td>
                                    <td data-field="age">{{$subsubcategory->subcategory->name}}</td>
                                    <td data-field="age">{{$subsubcategory->name}}</td>

                                    <td style="width: 100px">
                                        @if($subsubcategory->status==1)
                                            <a href="{{route('subsubcategory.show',$subsubcategory->id)}}" class="btn btn-primary">Active</a>
                                        @else
                                            <a href="{{route('subsubcategory.show',$subsubcategory->id)}}" class="btn btn-danger">Inactive</a>
                                        @endif

                                    </td>
                                    <td style="width: 100px">
                                        <a href="{{route('subsubcategory.edit',$subsubcategory->id)}}" class="btn btn-primary" title="Edit">
                                            <i class="fe fe-edit"></i>
                                        </a>
                                        <form action="{{ route('subsubcategory.destroy', $subsubcategory->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this SubSubCategory?')">
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


