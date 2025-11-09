@extends('master.admin.master')
@section('title')
    Dashboard
@endsection
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    .stat-card{
        border-radius: 12px;
        transition: .3s;
        position: relative;
        background: #fff;
        padding: 20px !important;
        border: none !important;
    }
    .stat-card:hover{
        transform: translateY(-6px);
        box-shadow: 0 12px 25px rgba(0,0,0,.15);
    }
    .stat-icon{
        width: 70px;
        height: 55px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        color: #fff;
    }
    .bg-gradient-primary{ background: linear-gradient(45deg,#4e54c8,#8f94fb); }
    .bg-gradient-success{ background: linear-gradient(45deg,#00b09b,#96c93d); }
    .bg-gradient-warning{ background: linear-gradient(45deg,#f7971e,#ffd200); }
    .bg-gradient-danger{ background: linear-gradient(45deg,#d9534f,#ff6b6b); }
    .bg-gradient-info{ background: linear-gradient(45deg,#36d1dc,#5b86e5); }
</style>

@section('body')
    <div class="row g-3">
        <div class="container">
            <div class="row">
                <!-- Total Visitors -->
                <div class="col-6 col-md-4 col-lg-3 mb-3">
                    <div class="text-dark">
                        <div class="stat-card d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bold mb-1">{{ number_format(\App\Models\Post::sum('view_count')) }}</h3>
                                <small class="text-muted">Total Visitors</small>
                            </div>
                            <div class="stat-icon bg-gradient-primary">
                                <i class="bi bi-eye"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active News -->
                <div class="col-6 col-md-4 col-lg-3 mb-3">
                    <div class="text-dark">
                        <div class="stat-card d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bold mb-1">{{ \App\Models\Post::where('status',1)->count() }}</h3>
                                <small class="text-muted">Active News</small>
                            </div>
                            <div class="stat-icon bg-gradient-success">
                                <i class="bi bi-check-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Inactive News -->
                <div class="col-6 col-md-4 col-lg-3 mb-3">
                    <div class="text-dark">
                        <div class="stat-card d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bold mb-1">{{ \App\Models\Post::where('status',2)->count() }}</h3>
                                <small class="text-muted">Inactive News</small>
                            </div>
                            <div class="stat-icon bg-gradient-danger">
                                <i class="bi bi-x-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Categories -->
                <div class="col-6 col-md-4 col-lg-3 mb-3">
                    <div class="text-dark">
                        <div class="stat-card d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bold mb-1">{{ \App\Models\Category::count() }}</h3>
                                <small class="text-muted">Categories</small>
                            </div>
                            <div class="stat-icon bg-gradient-warning">
                                <i class="bi bi-grid"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sub Category -->
                <div class="col-6 col-md-4 col-lg-3 mb-3">
                    <div class="text-dark">
                        <div class="stat-card d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bold mb-1">{{ \App\Models\SubCategory::count() }}</h3>
                                <small class="text-muted">Sub Category</small>
                            </div>
                            <div class="stat-icon bg-gradient-warning">
                                <i class="bi bi-diagram-3"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- District -->
                <div class="col-6 col-md-4 col-lg-3 mb-3">
                    <div class="text-dark">
                        <div class="stat-card d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bold mb-1">{{ \App\Models\SubsubCategory::count() }}</h3>
                                <small class="text-muted">District</small>
                            </div>
                            <div class="stat-icon bg-gradient-info">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upazila -->
                <div class="col-6 col-md-4 col-lg-3 mb-3">
                    <div class="text-dark">
                        <div class="stat-card d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bold mb-1">{{ \App\Models\Upazila::count() }}</h3>
                                <small class="text-muted">Upazila</small>
                            </div>
                            <div class="stat-icon bg-gradient-success">
                                <i class="bi bi-signpost-split"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reporter -->
                <div class="col-6 col-md-4 col-lg-3 mb-3">
                    <div class="text-dark">
                        <div class="stat-card d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bold mb-1">{{ \App\Models\Reporter::count() }}</h3>
                                <small class="text-muted">Reporter</small>
                            </div>
                            <div class="stat-icon bg-gradient-info">
                                <i class="bi bi-person-video"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Videos -->
                <div class="col-6 col-md-4 col-lg-3 mb-3">
                    <div class="text-dark">
                        <div class="stat-card d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bold mb-1">{{ \App\Models\Video::count() }}</h3>
                                <small class="text-muted">Videos</small>
                            </div>
                            <div class="stat-icon bg-gradient-danger">
                                <i class="bi bi-play-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

@endsection
