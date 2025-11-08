@extends('master.admin.master')
@section('title')
    Dashboard
@endsection
@section('body')
    <div class="main-container container-fluid">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Dashboard</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 -->
    <div class="row">
        <div class="row g-3">
            <!-- Total Visitors -->
            <div class="col-6 col-lg-3">
                <a href="{{ route('post.index') }}" class="text-decoration-none">
                    <div class="card h-100 overflow-hidden">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="mb-2 fw-semibold">{{ number_format(\App\Models\Post::sum('view_count')) }}</h3>
                                <p class="text-muted fs-13 mb-0">Total Visitors</p>
                            </div>
                            <div class="counter-icon bg-primary dash box-shadow-primary d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-white" viewBox="0 0 24 24">
                                    <path d="M12,8c-2.2091675,0-4,1.7908325-4,4s1.7908325,4,4,4c2.208252-0.0021973,3.9978027-1.791748,4-4C16,9.7908325,14.2091675,8,12,8z M12,15c-1.6568604,0-3-1.3431396-3-3s1.3431396-3,3-3c1.6561279,0.0018311,2.9981689,1.3438721,3,3C15,13.6568604,13.6568604,15,12,15z M21.960022,11.8046875C19.9189453,6.9902344,16.1025391,4,12,4s-7.9189453,2.9902344-9.960022,7.8046875c-0.0537109,0.1246948-0.0537109,0.2659302,0,0.390625C4.0810547,17.0097656,7.8974609,20,12,20s7.9190063-2.9902344,9.960022-7.8046875C22.0137329,12.0706177,22.0137329,11.9293823,21.960022,11.8046875z M12,19c-3.6396484,0-7.0556641-2.6767578-8.9550781-7C4.9443359,7.6767578,8.3603516,5,12,5s7.0556641,2.6767578,8.9550781,7C19.0556641,16.3232422,15.6396484,19,12,19z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Total Active News -->
            <div class="col-6 col-lg-3">
                <a href="{{ route('post.index') }}" class="text-decoration-none">
                    <div class="card h-100 overflow-hidden">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="mb-2 fw-semibold">{{ \App\Models\Post::where('status',1)->count() }}</h3>
                                <p class="text-muted fs-13 mb-0">Total Active News</p>
                            </div>
                            <div class="counter-icon bg-secondary dash box-shadow-secondary d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 24 24">
                                    <path d="M4 4h16v2H4V4zm0 4h16v2H4V8zm0 4h10v2H4v-2zm0 4h10v2H4v-2z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Total Inactive News -->
            <div class="col-6 col-lg-3">
                <a href="{{ route('post.index') }}" class="text-decoration-none">
                    <div class="card h-100 overflow-hidden">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="mb-2 fw-semibold">{{ \App\Models\Post::where('status',2)->count() }}</h3>
                                <p class="text-muted fs-13 mb-0">Total Inactive News</p>
                            </div>
                            <div class="counter-icon bg-danger dash box-shadow-danger d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 24 24">
                                    <path d="M3 5h18v14H3V5zm2 2v10h14V7H5zm5 2h4v2h-4V9zm0 4h4v2h-4v-2z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Total Categories -->
            <div class="col-6 col-lg-3">
                <a href="{{ route('category.index') }}" class="text-decoration-none">
                    <div class="card h-100 overflow-hidden">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="mb-2 fw-semibold">{{ \App\Models\Category::count() }}</h3>
                                <p class="text-muted fs-13 mb-0">Total Categories</p>
                            </div>
                            <div class="counter-icon bg-warning dash box-shadow-warning d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 24 24">
                                    <path d="M4 4h16v2H4V4zm0 4h16v2H4V8zm0 4h16v2H4v-2zm0 4h16v2H4v-2z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Total SubCategories -->
            <div class="col-6 col-lg-3">
                <a href="{{ route('subcategory.index') }}" class="text-decoration-none">
                    <div class="card h-100 overflow-hidden">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="mb-2 fw-semibold">{{ \App\Models\SubCategory::count() }}</h3>
                                <p class="text-muted fs-13 mb-0">Total SubCategories</p>
                            </div>
                            <div class="counter-icon bg-warning dash box-shadow-warning d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 24 24">
                                    <path d="M10 4H2v16h20V6H12l-2-2zM2 18V6h8l2 2h10v10H2z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Total Sub-SubCategories / Districts -->
            <div class="col-6 col-lg-3">
                <a href="{{ route('subsubcategory.index') }}" class="text-decoration-none">
                    <div class="card h-100 overflow-hidden">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="mb-2 fw-semibold">{{ \App\Models\SubSubCategory::count() }}</h3>
                                <p class="text-muted fs-13 mb-0">Total District</p>
                            </div>
                            <div class="counter-icon bg-info dash box-shadow-info d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 24 24">
                                    <path d="M4 4h16v2H4V4zm0 4h16v2H4V8zm0 4h16v2H4v-2zm0 4h16v2H4v-2z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Total Upazila -->
            <div class="col-6 col-lg-3">
                <a href="{{ route('upazila.index') }}" class="text-decoration-none">
                    <div class="card h-100 overflow-hidden">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="mb-2 fw-semibold">{{ \App\Models\Upazila::count() }}</h3>
                                <p class="text-muted fs-13 mb-0">Total Upazila</p>
                            </div>
                            <div class="counter-icon bg-success dash box-shadow-success d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 24 24">
                                    <path d="M4 4h16v2H4V4zm0 4h16v2H4V8zm0 4h16v2H4v-2zm0 4h16v2H4v-2z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Total Reporter -->
            <div class="col-6 col-lg-3">
                <a href="{{ route('reporter.index') }}" class="text-decoration-none">
                    <div class="card h-100 overflow-hidden">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="mb-2 fw-semibold">{{ \App\Models\Reporter::count() }}</h3>
                                <p class="text-muted fs-13 mb-0">Total Reporter</p>
                            </div>
                            <div class="counter-icon bg-info dash box-shadow-info d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 24 24">
                                    <path d="M12 12c2.7614237 0 5-2.2385763 5-5s-2.2385763-5-5-5-5 2.2385763-5 5 2.2385763 5 5 5zm0 2c-3.866 0-7 3.134-7 7v1h14v-1c0-3.866-3.134-7-7-7z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Total Videos -->
            <div class="col-6 col-lg-3">
                <a href="{{ route('video.index') }}" class="text-decoration-none">
                    <div class="card h-100 overflow-hidden">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="mb-2 fw-semibold">{{ \App\Models\Video::count() }}</h3>
                                <p class="text-muted fs-13 mb-0">Total Videos</p>
                            </div>
                            <div class="counter-icon bg-danger dash box-shadow-danger d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 24 24">
                                    <path d="M4 4h16v16H4V4zm2 2v12h12V6H6zm3 2l6 4-6 4V8z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>








    </div>

    </div>
@endsection
