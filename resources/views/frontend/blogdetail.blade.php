@include('frontend.header')
  


    <div class="container-fluid">


    @if(isset($getblogById))
      
       
            <div class="gallery col-xl-12">
                <img src="{{ asset('/uploads/blog/'.$getblogById['image']) }}" class="rounded" alt="contentntainer-fluidque Terre"  width="500" height="500">
            </div>

            <div>
                <p>{{ $getblogById['description'] }}

            </div>
            <hr>
            <br>
            <strong>Author: {{ ucfirst($getblogById['author']) }}</strong><br>
            <strong>Date: {{ $getblogById['created_at'] }}</strong>
      
       
    @endif

    </div> 

  


@include('frontend.footer')


