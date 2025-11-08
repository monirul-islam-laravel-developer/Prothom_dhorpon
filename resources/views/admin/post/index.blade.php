@extends('master.admin.master')
@section('title')
    All Post
@endsection
@section('body')
    <div class="row">
        <div class="row row-sm">
            <div class="col-lg-12">
                @php
        // Fetch the user type of the authenticated user
        $userType = auth()->user()->user_type;

        // Initialize roleRoutes variable
        $roleRoutes = [];

        // If user_type is not 1, fetch the role IDs and route names
        if ($userType !== 1) {
            $roleIds = DB::table('user_roles')->where('user_id', auth()->user()->id)->pluck('role_id')->toArray();
            $roleRoutes = DB::table('role_routes')->whereIn('role_id', $roleIds)->pluck('route_name')->toArray();
        }
    @endphp

                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Post Index</h3>
                        @if ($userType == 1 || in_array('post.create', $roleRoutes))
                        <a href="{{route('post.create')}}" class="btn btn-primary">Add Post</a>
                            @endif
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
                                <th>Url</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr data-id="1">
                                    <td data-field="id">{{$loop->iteration}}</td>
                                    <td data-field="age">{{$post->title}}</td>
                                    <td>
                                        <div class="copy-wrapper" style="position: relative; display: inline-block;">
                                            <button class="btn btn-sm btn-outline-primary copy-btn"
                                                    onclick="copyPostUrl('{{ route('news-detail',$post->id) }}', this)"
                                                    title="Copy Post URL">
                                                📋 Copy URL
                                            </button>
                                            <span class="copy-msg" style="display:none; position:absolute; left:105%; top:50%; transform:translateY(-50%); background:#0d6efd; color:#fff; padding:2px 8px; border-radius:4px; font-size:12px;">
                            ✅ Copied!
                        </span>
                                        </div>
                                    </td>
                                    <td data-field="image">
                                        <img src="{{asset($post->image)}}" height="60" width="100">
                                    </td>

                                    <td style="width: 100px">
                                        @if($post->status==1)
                                            <a href="{{route('post.show',$post->id)}}" class="btn btn-primary">Active</a>
                                        @else
                                            <a href="{{route('post.show',$post->id)}}" class="btn btn-danger">Inactive</a>
                                        @endif

                                    </td>
                                    <td style="width: 100px">
                                        <a href="{{route('post.edit',$post->id)}}" class="btn btn-primary" title="Edit">
                                            <i class="fe fe-edit"></i>
                                        </a>
                                        <form action="{{route('post.destroy',$post->id)}}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this Post?')">
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
    <!-- ✅ JS Function -->
    <script>
        function copyPostUrl(url, button) {
            navigator.clipboard.writeText(url).then(() => {
                const msg = button.parentElement.querySelector('.copy-msg');
                msg.style.display = 'inline';
                setTimeout(() => {
                    msg.style.display = 'none';
                }, 1500);
            }).catch(err => {
                console.error('Copy failed:', err);
                alert('❌ Failed to copy!');
            });
        }
    </script>

    <!-- ✅ Optional Styling -->
    <style>
        .copy-btn {
            font-size: 13px;
            padding: 4px 10px;
            border-radius: 5px;
            transition: 0.2s;
        }
        .copy-btn:hover {
            background: #0d6efd;
            color: #fff;
        }
        .copy-msg {
            animation: fadeInOut 1.5s ease;
        }
        @keyframes fadeInOut {
            0% {opacity: 0;}
            10% {opacity: 1;}
            90% {opacity: 1;}
            100% {opacity: 0;}
        }
    </style>
@endsection
