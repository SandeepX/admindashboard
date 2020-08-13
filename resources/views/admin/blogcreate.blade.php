@extends('layout.admin' )

@if(isset($data)&& !empty($data))
	@section('title','Blog Update page')
@else
	@section('title','Blog Add page')
@endif



@section('main-content')
  <section class="content">
      <div class="container-fluid">
      	@if(isset($data) && !empty($data))
      		<form action="{{route('blog.update' ,$data->id)}}" method="post" enctype="multipart/form-data" >
      			
      			@method('PUT')
       	@else
       		<form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data" >
       	@endif

		@csrf
			<div class="form-group">
				<label for="Title">Title:</label>
				<input type="text" class="form-control" 
					id="title" 
					value="{{$data->title}}" 
					name="title"
					placeholder="Enter Blog title...">
			</div>

			<div class="form-group">
				<label for="summary">summary:</label>
				<textarea class="form-control"
					id="summary"
					name="summary"
					placeholder="summary..."
					rows="2">
					{{$data->summary}}
				</textarea>
			</div>

			<div class="form-group">
				<label for="description">Description:</label>
				<textarea class="form-control" 
					id="description"
					name="description"
					 
					rows="5">
					{{$data->description}}
	
				</textarea>
			</div>

			<div class="form-group">
				<label for="Author">Author:</label>
				<input type="text" class="form-control" 
					id="author" 
					name="author" 
					value="{{$data->author}}" 
					placeholder="Enter Author...">
			</div>

			<div class="form-group">
				<label for="status">Status</label>
				<select class="form-control" id="status"  name="status" value="{{$data->status}}">

					<option value="inactive">Inactive</option>
					<option value="active">Active</option>
					
				</select>
			</div>

            <div class="form-group">
                <img src="{{asset('uploads/blog/'.$data->image)}}" class="img img-thumbnail img-responsive" style="width: 140px; height:150px;" alt="">
            </div>

			<div class="form-group">
				<label for="image">Image Upload</label>
				<input type="file" class="form-control-file"  id="image" name="image">
			</div>


 
  
			<div class="form-group">
				<button class="btn btn-success">{{((isset($data))?'Update':'Submit')}}</button>
			</div>
  
		</form>
        
      </div>
  </section>





@endsection  



  