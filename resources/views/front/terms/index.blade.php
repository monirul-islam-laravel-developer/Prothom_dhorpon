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
                        <span>শর্তাবলী ও নিয়মাবলী </span>
                    </div>

                    <div class="create-page-details">
                        {!! $terms->terms_and_conditions !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
