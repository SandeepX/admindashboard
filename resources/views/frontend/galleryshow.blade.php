@include('frontend.header')

    
    <nav class="navbar navbar-light bg-light" >
        <span class="navbar-brand mb-0 h1"><strong>View Gallery Image</strong></span>
    </nav>   

    <table class="table table-bordered table-hover table-striped">
        <thead>
        <tr><th> Uploaded Date</th>
            <th>Picture</th>
        </tr>
        </thead>
            <tbody>
                @foreach($data as $image)
               <tr><td>{{$image->created_at}}</td>
                   <td> <?php foreach (json_decode($image->filename)as $picture) { ?>
                         <img src="{{ asset('/image/'.$picture) }}" style="height:120px; width:200px"/>
                        <?php } ?>
                   </td>
              </tr>
                @endforeach
            </tbody>

    </table>
   {{ $data->links() }}


@include('frontend.footer')