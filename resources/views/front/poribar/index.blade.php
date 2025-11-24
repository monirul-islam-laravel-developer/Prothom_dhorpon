@extends('master.front.master')
@section('title')
    আমাদের পরিবার
@endsection
@section('body')

    <div class="all-section" style="overflow: hidden;"><!-- All Section-->
        <section class="team-section">
            <div class="container">
                <div class="row">
                    @foreach($reporters as $reporter)
                    <div class="themesBazar-4 themesBazar-m2">
                        <div class="team-wrpp">
                            <div class="team-image">
                                <a href="{{route('reporter-view',[$reporter->id,$reporter->slug])}}">
                                <img src="{{asset($reporter->image)}}" style="height: 260px;" alt="{{$reporter->name}}">
                                </a>
                            </div>
                            <h1 class="team-name">
                                <a href="{{route('reporter-view',[$reporter->id,$reporter->slug])}}">{{$reporter->name}}</a>
                            </h1>
                            <h6 class="team-deg">
                                {{$reporter->designation}}
                            </h6>
                        </div>

                    </div>
                    @endforeach

                    <div style="text-align: center; display: ruby; margin:20px">  </div>




                </div>


            </div>
        </section>





    </div><!-- All Section Close -->



@endsection
