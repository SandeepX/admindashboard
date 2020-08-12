@include('frontend.header')
  


  <div class="slider_area">
       
        

            <div class="container-fluid">
                @if(isset($blogData))
                    <div class="row">
                        @foreach($blogData as $key =>$blogdetail)
                                
                            <div class="col-xl-6 col-md-6">
                                <div class="single_service text-center">

                                	<div class="gallery col-xl-4">
                               
      								<a href="{{ route('Blog.show', $blogdetail->id)}}">
                                    <img src="{{ asset('/uploads/blog/'.$blogdetail->image) }}" class="rounded" alt="contentntainer-fluidque Terre"    width="304" height="236"></a>
                                      
                                    
                        			</div>
                                    
                                    <div>
                                    	<h3>{{ucfirst($blogdetail->title)  }}</h3>
                                    </div>

                                    <div>
                                    
                                       <p> {{ $blogdetail->summary |  substr:0,200 }} </p>
                                    </div> 
									
									<div>
                                    	<strong>Date:{{$blogdetail->created_at | date:'Y/m/d' }} </strong> 
                                    </div>

                                   
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                    

                
            </div>

   </div>

  


@include('frontend.footer')


