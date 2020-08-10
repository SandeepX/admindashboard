@extends('layout.admin')
@section('title','Upload video')
@section('main-content')




@if(isset($videodata))
    <section class="content">
		
  
        <table class="table table-hover">
        	
          <thead>
            <tr>
            	<th scope="col">Id</th>
				<th scope="col">Title</th>
				<th scope="col">Filename</th>
				
				<th scope="col">Action</th>

            </tr>
          </thead>
          <tbody>
            


              @foreach($videodata as $key=>$detail)
                <tr>
                  <th scope="row">{{$detail->id}}</th>
                  <td>{{$detail->title}}</td>

                  <td>{{$detail->filename}}</td>

                  
                  
	                <td>

						


	                  	<form class="m-2" method="post" action="{{route('video.destroy', $detail->id)}}" onclick="return confirm('Are you sure?')">
	                      @csrf
	                      @method('delete')
						<button type="submit" class="btn btn-danger">Delete</button>

						</form>
					</td>  
                </tr>
              @endforeach
            
          </tbody>

        </table>
       {{ $videodata->links() }} 
        
  </section>
 	@endif

  <hr>


  <section class="content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<h2 class="card-header w-100 m-1 text-center">Video upload</h2>
		</div>
			<div class="row justify-content-center">
			
			<form class="m-2" method="post" action="{{route('video.store')}}" enctype="multipart/form-data">
			@csrf
				<div class="form-group">
				<label for="name">Title</label>
				    <input type="text" class="form-control" id="title" placeholder="Enter Video Title" name="title">
				</div>

				

				

				<div class="form-group">
					<div>
						
				    <label for="video">Upload Video:</label>
					</div>
				    <input id="video" type="file" name="video">
				</div>
				<button type="submit" class="btn btn-dark d-block w-75 mx-auto">Submit</button>
			</form>
		</div>
	
	</div>
  </section>
@endsection  



  