@extends('layout.admin' )
@section('title','Blog Add page')

@section('main-content')
  <section class="content">
      <div class="container-fluid">
       <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data" >
       	@csrf
			<div class="form-group">
				<label for="Title">Title:</label>
				<input type="text" class="form-control" id="title" name="title" placeholder="Enter Blog title...">
			</div>

			<div class="form-group">
				<label for="summary">summary:</label>
				<textarea class="form-control" id="summary" name="summary" rows="2"></textarea>
			</div>

			<div class="form-group">
				<label for="description">Description:</label>
				<textarea class="form-control" id="description" name="description" rows="5">	
				</textarea>
			</div>

			<div class="form-group">
				<label for="Author">Author:</label>
				<input type="text" class="form-control" id="author" name="author" placeholder="Enter Author...">
			</div>

			<div class="form-group">
				<label for="status">Status</label>
				<select class="form-control" id="status" name="status" >
					<option value="inactive">Inactive</option>
					<option value="active">Active</option>
					
				</select>
			</div>


			<div class="form-group">
				<label for="image">Image Upload</label>
				<input type="file" class="form-control-file" id="image" name="image">
			</div>

 
  
			<div class="form-group">
				<button class="btn btn-success">Submit</button>
			</div>
  
		</form>
        
      </div>
  </section>





@endsection  



  