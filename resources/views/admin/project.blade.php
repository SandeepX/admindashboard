@extends('layout.admin')

@section('title','Posts')

@section('main-content')

<section class="content">

  
        <table class="table table-hover">
          <thead>
            <tr>
            	<th scope="col">Id</th>
				<th scope="col">Title</th>
				<th scope="col">link</th>
				<th scope="col">Description</th>
				<th scope="col">Action</th>

            </tr>
          </thead>
          <tbody>
            @if(isset($projectData))


              @foreach($projectData as $key=>$detail)
                <tr>
                  <th scope="row">{{$detail->id}}</th>
                  <td>{{$detail->title}}</td>

                  <td>{{$detail->link}}</td>

                  <td>{{$detail->description}}</td>
                  
	                <td>

						


	                  	<form class="m-2" method="post" action="{{route('project.destroy', $detail->id)}}" onclick="return confirm('Are you sure?')">
	                      @csrf
	                      @method('delete')
						<button type="submit" class="btn btn-danger">Delete</button>

						</form>
					</td>  
                </tr>
              @endforeach
            @endif 
          </tbody>

        </table>
       {{ $projectData->links() }} 
        
  </section>















  <hr>
		<div class="container">
			
			<form class="form-horizontal col-sm-10 col-lg-10 col-sm-10"  style="background-color: white; "method="post" action="{{route('project.store')}}" >
				<h1>New post</h1>
				@csrf()
    		
					<div class="form-group">
						<label class="control-label col-sm-4" for="post-title">Title:</label>
						<div class="col-sm-9">
						  <input type="text" placeholder="Enter Title.." class="form-control"  required name="title" spellcheck="false" autofocus /> 
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-sm-4" for="post-title">link:</label>
						<div class="col-sm-9">
						  <input type="link"  placeholder="Enter link" class="form-control"  required name="link" spellcheck="false" autofocus /> 
						</div>
					</div>

					<div class="form-group">
					   <label class="control-label col-sm-4" for="post-content">Description</label>
					    <div class="col-sm-9">
					      <textarea placeholder="Write description"
					        style="resize: vertical"		        
					        
					        rows="7" cols="50" 
					        name="description" 
					        spellcheck="false" 
					        autofocus 
					        class="form-control autosize-target text-left">
					         
					      </textarea>       	
					   </div>
				  	</div>


				 
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-primary" value="submit">submit</button>
				    </div>
				  </div>
			</form>



		</div>
  
@endsection  



  