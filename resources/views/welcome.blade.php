@include('frontend.header')


@if(isset($profile))    
    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1" style="background-image: url( {{ asset('uploads/profile/') }}/{{$profile[0]->url}} );">
            <div class="shap_pattern d-none d-lg-block">
                <img src="{{asset('/sandeep/img/about/grid.png')}}" alt="">
            </div>
            <div class="social_links">
                <ul>
                    <li><a href="https://www.facebook.com/sandeep.pant.3701"> <i class="fa fa-facebook"></i> </a></li>
                    
                    <li><a href="https://www.instagram.com/sandeep_pant23/"> <i class="fa fa-instagram"></i> </a></li>
                </ul>
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12">
                        <div class="slider_text text-center">
                            <h3>
                                Hello This is {{ $profile[0]->name }}
                            </h3>
                            <span>{{ $profile[0]->work}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif    
    <!-- slider_area_end -->

    <!-- service_area  -->
    <div class="service_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-65">
                        <span>Service Provided</span>
                        <h3>Build brands campaigns  <br>
                                & digital projects</h3>
                    </div>
                </div>
            </div>

                @if(isset($projectdetail))
                    <div class="row">
                        @foreach($projectdetail as $key =>$value)
                                
                            <div class="col-xl-4 col-md-4">
                                <div class="single_service text-center">
                                    
                                    <h3>{{ucfirst($value->title)  }}</h3>

                                    <div>
                                    
                                       <p> {{ $value->description | substr:0,500 }} </p>
                                    </div> 

                                    <div>
                                       
                                        <a href="{{ $value->link}}"><b>click here for code</b></a> 

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
        </div>
    </div>
    <!--/ service_area  -->

    <!-- portfolio_area -->
    <div class="portfolio_area portfolio_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title white_text text-center">
                        <span> Phenomenal Portfolios</span>
                        <h3>Some of my awesome <br>
                                stuffs here</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ portfolio_area -->

    <!-- portfolio_video_area  -->

        <div class="portfolio_image_area">
            <div class="container">

                <div class="row">
                    @if(isset($videodata))
                        @foreach($videodata as $video)
                            <div class="col-md-6">

                                <div class="single_Portfolio">
                                    <div class="portfolio_thumb">
                                        <iframe src="{{ asset('uploads/video/') }}/{{$video->filename}}" width="500" height="500"></iframe>
                                    </div>
                                </div>
                                
                            </div>
                        @endforeach
                    @endif

    <!--end portfolio_video_area  --> 
       
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="single_Portfolio">
                            <div class="portfolio_thumb">
                                <img src="{{ asset('uploads/profile/') }}/{{$profile[0]->url}}" alt="">
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="single_Portfolio">
                            <div class="portfolio_thumb">
                                <img src="{{ asset('uploads/profile/') }}/{{$profile[0]->url}}" alt="">
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12 col-lg-4">
                        <div class="single_Portfolio">
                            <div class="portfolio_thumb">
                                <img src="{{ asset('uploads/profile/') }}/{{$profile[0]->url}}" alt="">
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="more_portfolio text-center">
                            <a class="line_btn" href="#">More Folio</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--/ portfolio_image_area  -->

    <!-- about_me  -->
    <div class="about_me">
        <div class="about_large_title d-none d-lg-block">
                About
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-md-6">
                    <div class="about_e_details">
                        <h3>About Sandeep</h3>
                        <p>
                            {!! $aboutdata !!}
                        </p>

                        <div class="download_cv">
                            <a class="boxed-btn3" href="{{url('/download')}}">Download CV</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="about_img">
                        <div class="color_pattern d-none d-lg-block">
                            <img src="" alt="">
                        </div>
                        <div class="my_Pic">
                                <img src="{{ asset('uploads/profile/') }}/{{$profile[0]->url}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ about_me  -->

    <div class="counter_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="single_counter text-center">
                        <h3>
                            <span class="counter" >520 </span><span>+</span>
                        </h3>
                        <p>Total Projects</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_counter text-center">
                        <h3>
                            <span class="counter">244 </span>
                        </h3>
                        <p>On Going Projects</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_counter text-center">
                        <h3>
                            <span class="counter" >95 </span> <span>%</span>
                        </h3>
                        <p>Job Success</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial_area  -->
    <div class="testimonial_area ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="testmonial_active owl-carousel">
                            <div class="single_carousel">
                                <div class="single_testmonial text-center">
                                    <div class="quote">
                                        <img src="img/testmonial/quote.svg" alt="">
                                    </div>
                                    <p>Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor <br> 
                                            sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque.  <br>
                                            Fusce ac mattis nulla. Morbi eget ornare dui. </p>
                                    <div class="testmonial_author">
                                        <div class="thumb">
                                                <img src="img/testmonial/thumb.png" alt="">
                                        </div>
                                        <h3>Robert Thomson</h3>
                                        <span>Business Owner</span>
                                    </div>
                                </div>
                            </div>
                            <div class="single_carousel">
                                <div class="single_testmonial text-center">
                                    <div class="quote">
                                        <img src="img/testmonial/quote.svg" alt="">
                                    </div>
                                    <p>Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor <br> 
                                            sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque.  <br>
                                            Fusce ac mattis nulla. Morbi eget ornare dui. </p>
                                    <div class="testmonial_author">
                                        <div class="thumb">
                                                <img src="img/testmonial/thumb.png" alt="">
                                        </div>
                                        <h3>Robert Thomson</h3>
                                        <span>Business Owner</span>
                                    </div>
                                </div>
                            </div>
                            <div class="single_carousel">
                                <div class="single_testmonial text-center">
                                    <div class="quote">
                                        <img src="img/testmonial/quote.svg" alt="">
                                    </div>
                                    <p>Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor <br> 
                                            sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque.  <br>
                                            Fusce ac mattis nulla. Morbi eget ornare dui. </p>
                                    <div class="testmonial_author">
                                        <div class="thumb">
                                                <img src="img/testmonial/thumb.png" alt="">
                                        </div>
                                        <h3>Robert Thomson</h3>
                                        <span>Business Owner</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
        <!-- /testimonial_area  -->
    
    <div class="discuss_projects">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="project_text text-center">
                        <h3>Let’s discuss for a project</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua.</p>
                        <a class="boxed-btn3" href="#">Start Talking</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer start -->
   @include('frontend.footer')