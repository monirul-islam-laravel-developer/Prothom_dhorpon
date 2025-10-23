@extends('master.front.master')
@section('title')
    আমাদের সম্পর্কে
@endsection
@section('body')

    <div class="create-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="create-pageTitle">
                        <span>  আমাদের সম্পর্কে   </span>
                    </div>

                    <div class="create-page-details">
                        {!! $aboutus->about_us !!}
                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection

