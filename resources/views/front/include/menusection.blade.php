<div class="menu_section" id="myHeader">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="mobileLogo">
                    <a href="{{route('home')}}"> <img src="{{asset($webLogo->mobile_logo)}}" alt="LaraFlash"></a>
                </div>
                <h1 class="stellarnav">
                    <ul>
                        <li class="current-item"><a href="{{route('home')}}"> <i class="las la-home"></i> </a></li>



                        <li><a href="">সর্বশেষ</a>
                        </li>

                        @foreach($categories8 as $category)
                            <li>
                                <a href="{{ route('category-news', [$category->id, $category->slug]) }}">
                                    {{ $category->name }}
                                </a>

                            @if($category->subcategories->count() > 0)
                                    <ul>
                                        @foreach($category->subcategories as $subcategory)
                                            <li>
                                                <a href="{{ route('sub-category-news', [$subcategory->id, $subcategory->slug]) }}">
                                                    {{ $subcategory->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach


                        <li><a href="#" >আরো</a>

                            <ul>
                                @foreach($categories_all as $single_category)
                                <li><a href="{{ route('category-news', [$single_category->id, $single_category->slug]) }}" >{{$single_category->name}}</a>


                                </li>
                                @endforeach

                            </ul>
                        </li>

                    </ul>
                </h1><!-- .stellarnav -->
            </div>




        </div>
    </div>

</div>
