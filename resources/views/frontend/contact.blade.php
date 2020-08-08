@include('frontend.header')

   
  <div class="container-fluid">
		<section class="mb-4">

		   
		    	
		   		 <h2 class="h1-responsive font-weight-bold text-center my-4">Contact Me!!</h2>


		    
		    
		    <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact me directly. I will come back to you within
		        a matter of hours to help you.</p>

			@if(Session::has('success'))
				<div class="alert alert-success">
					{{ Session::get('success') }}
				</div>
			@endif

		    <div class="row">


		        <div class="col-md-9 mb-md-0 mb-5">
		            

		            <form class="m-2" method="post" action=" {{ url('/ContactMe/store')}}">
					@csrf

		               
		                <div class="row">

		                    <div class="col-md-6">
		                    	<label for="name" class="">Your name</label>
		                        <div class="md-form mb-0">
		                            <input type="text" id="name" name="name" class="form-control">
		                            
		                        </div>
		                    </div>
		                   
		                    <div class="col-md-6">
		                    	<label for="email" class="">Your email</label>
		                        <div class="md-form mb-0">
		                            <input type="text" id="email" name="email" class="form-control">
		                            
		                        </div>
		                    </div>
		                    

		                </div>
		                
		                <div class="row">
		                    <div class="col-md-12">
		                    	<label for="subject" class="">Subject</label>
		                        <div class="md-form mb-0">
		                            <input type="text" id="subject" name="subject" class="form-control">
		                            
		                        </div>
		                    </div>
		                </div>
		                
		                <div class="row">
		                    <div class="col-md-12">
								<label for="message">Your message</label>
		                        <div class="md-form">
		                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
		                        </div>

		                    </div>
		                </div>

		                <div class=" form-group text-center text-md-left">
                			<button  type="submit" class="btn btn-dark">send!</button>
            			</div>

		                
		            </form>

		            
		            
		        </div>
		       
		        <div class="col-md-3 text-center">
		            <ul class="list-unstyled mb-0">
		                <li><i class="fas fa-map-marker-alt fa-2x"></i>
		                    <p>Kathmandu, Nepal</p>
		                </li>

		                <li><i class="fas fa-phone mt-4 fa-2x"></i>
		                    <p>+ 977 9865852942</p>
		                </li>

		                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
		                    <p>sandeeppant024@gmail.com</p>
		                </li>
		            </ul>
		        </div>
		        
		    </div>

		</section>

</div>

@include('frontend.footer')

<script>
    setTimeout(function(){
      $('.alert').slideUp();
    } , 3000);
</script>