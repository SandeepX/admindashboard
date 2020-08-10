@include('frontend.header')
  <div class="container-fluid">
    <!-- <nav class="navbar navbar-light bg-light" >
        <span class="navbar-brand mb-0 h1"><strong>Image Gallery</strong></span>
    </nav> -->
    <!-- <nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
   
    Bootstrap
  </a>
</nav>
 -->
      @foreach($data as $image)
      <!-- <h3>{{$image->created_at}}</h3> -->
          <?php foreach(json_decode($image->filename) as $picture) {?>      
            <img src="{{ asset('/image/'.$picture) }}" class="rounded" alt="Cinque Terre" width="304" height="236">
          <?php } ?>
      @endforeach    
  </div>
  

{{ $data->links() }}

@include('frontend.footer')


