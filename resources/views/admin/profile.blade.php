@extends('layout.admin')
@section('title','Profile Page')
@section('main-content')

  <section class="content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<h2 class="card-header w-100 m-1 text-center">Profile Page</h2>
		</div>
			<div class="row justify-content-center">
			
			<form class="m-2" method="post" action="{{route('imageUpload')}}" enctype="multipart/form-data">
			@csrf
				<div class="form-group">
				<label for="name">File Name</label>
				    <input type="text" class="form-control" id="name" placeholder="Enter file Name" name="name">
				</div>

				<div class="form-group">
				<label for="work"></label>
				    <input type="text" class="form-control" id="work" placeholder="current job" name="work">
				</div>

				

				

				<div class="form-group">
				    <label for="image">Choose Image</label>
				    <input id="image" type="file" name="image">
				</div>
				<button type="submit" class="btn btn-dark d-block w-75 mx-auto">Submit</button>
			</form>
		</div>
	
	</div>
  </section>
@endsection  



  