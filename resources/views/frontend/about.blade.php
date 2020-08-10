@include('frontend.header')
    
       
    <div class="slider_area">
       <div class="single_slider  d-flex align-items-center slider_bg_1" style="background-image: url( {{ asset('uploads/profile/') }}/{{$profileImage[0]->url}} );">
            <div class="shap_pattern d-none d-lg-block">
                <img src="{{asset('/sandeep/img/about/grid.png')}}" alt="">
            </div>
           
            
        </div>

        

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12">
                        <div class="slider_text text-center">
                            <h3>
                               
                            </h3>
                            <div class="content">
                                {!! $about ?? '' !!}
                            </div>
                        </div>
                    </div>


                     
                    <div class="content">
                         @if(isset($data)) 
                            <div class="gallery">
                                @foreach($data as $image)
      
                                      <?php foreach(json_decode($image->filename) as $picture) {?>      
                                        <img src="{{ asset('/image/'.$picture) }}" class="rounded" alt="Cinque Terre" width="304" height="236">
                                      <?php } ?>
                                @endforeach     
                            </div>
                         @endif   
                    </div>
                    

                </div>
            </div>

    </div>
        

        
            <section id="main">
                <div class="inner">

                
                <!--  Two -->
                    
                <!-- Three -->
                   <!--  <section id="three" class="wrapper">
                        <div class="spotlight">
                            <div class="image flush"><img src="images/pic06.jpg" alt="" /></div>
                            <div class="inner">
                                <h3>Viverra Hendrerit</h3>
                                <p>Curabitur eget semper ante. Morbi eleifend ultricies est, a blandit diam vehicula vel. Vestibulum porttitor nisi quis viverra hendrerit. Suspendisse vel volutpat nibh, vel elementum lacus. Maecenas commodo pulvinar dui, at cursus metus imperdiet vel.</p>
                            </div>
                        </div>
                        <div class="spotlight alt">
                            <div class="image flush"><img src="images/pic07.jpg" alt="" /></div>
                            <div  class="inner">
                                <h3>Curabitur Eget</h3>
                                <p>Curabitur eget semper ante. Morbi eleifend ultricies est, a blandit diam vehicula vel. Vestibulum porttitor nisi quis viverra hendrerit. Suspendisse vel volutpat nibh, vel elementum lacus. Maecenas commodo pulvinar dui, at cursus metus imperdiet vel.</p>
                            </div>
                        </div>
                        <div class="spotlight">
                            <div class="image flush"><img src="images/pic08.jpg" alt="" /></div>
                            <div class="inner">
                                <h3>Morbi Eleifend</h3>
                                <p>Curabitur eget semper ante. Morbi eleifend ultricies est, a blandit diam vehicula vel. Vestibulum porttitor nisi quis viverra hendrerit. Suspendisse vel volutpat nibh, vel elementum lacus. Maecenas commodo pulvinar dui, at cursus metus imperdiet vel.</p>
                            </div>
                        </div>
                    </section> 
 -->
                </div>
            </section>

        

        
            

    


    
@include('frontend.footer')  