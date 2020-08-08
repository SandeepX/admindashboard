@extends('layout.admin')

@section('title','Gallery')

@section('styles')

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

@endsection


@section('main-content')
  <section class="content">
    <div class="container-fluid ">

		
		@if (count($errors) > 0)
	      <div class="alert alert-danger">
	        <strong>Sorry !</strong> There were some problems with your input.<br><br>
	        <ul>
	          @foreach ($errors->all() as $error)
	              <li>{{ $error }}</li>
	          @endforeach
	        </ul>
	      </div>
	      @endif

	    @if(session('success'))
	        <div class="alert alert-success">
	          {{ session('success') }}
	        </div> 
	    @endif





       <h3 class="jumbotron"><i class="glyphicon glyphicon-upload"></i> Upload Images in Gallery</h3> 

		<form method="post" action="{{route('imageuploadgallery')}}" enctype="multipart/form-data">
	  		{{csrf_field()}}

			<!-- <div class="form-group">
				<label for="name">Caption:</label>
			    <input type="textarea" class="form-control" id="caption" placeholder="Caption here.." name="caption" required>
			</div> -->

	        <div class="input-group control-group increment" >
	          <input type="file" name="filename[]" class="form-control" required>
	          <div class="input-group-btn"> 
	            <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
	          </div>
	        </div>

	        <div class="clone hide">
	          <div class="control-group input-group" style="margin-top:10px">
	            <input type="file" name="filename[]" class="form-control">
	            <div class="input-group-btn"> 
	              <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
	            </div>
	          </div>
	        </div>
	        <button type="submit" class="btn btn-info" style="margin-top:12px"><i class="glyphicon glyphicon-check"></i> Submit</button>
	  </form>
		   
	</div>

			@section('scripts')

				<script type="text/javascript">
				    $(document).ready(function() {
				      $(".btn-success").click(function(){ 
				          var html = $(".clone").html();
				          $(".increment").after(html);
				      });
				      $("body").on("click",".btn-danger",function(){ 
				          $(this).parents(".control-group").remove();
				      });
				    });
				</script>
			@endsection


		
	</section>
@endsection  



  