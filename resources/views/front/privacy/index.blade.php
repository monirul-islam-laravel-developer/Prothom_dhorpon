@extends('master.front.master')
@section('title')
    প্রাইভেসি এবং পলিসি
@endsection
@section('body')

    <div class="create-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="create-pageTitle">
                        <span>  গোপনীয়তা নীতি </span>
                    </div>

                    <div class="create-page-details">
                        {!! $privacy->privacy_and_policy !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
