@extends('layout.admin' )
@section('title','Blog')

@section('main-content')
<section class="content">
    <div class="container-fluid">
    	<div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-head">
                       
                        <a href="{{route('blog.create')}}" class="btn  btn-success add_btn">
                            <i class="fa fa-plus"></i>Add Blog
                        </a>
                    </div>
                </div>    
                
                <div class="ibox-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>summary</th>
                                <th>image</th>
                                
                                <th>Status</th>
                             
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($blogData))
                                @foreach($blogData as $key=>$blogdetail)
                                    <tr>
                                        <td> {{ $blogdetail->title}} </td>
                                        <td> 
                                            {{$blogdetail->summary}} 
                                        </td>

                                        <td> 
                                            <img src="{{ asset('uploads/blog/'.$blogdetail->image) }}" alt="" class="img img-thumbnail img-responsive">
                                        </td>
        								


                                        <td>
                                            <span class="badge badge-{{ ( $blogdetail->status=='active') ? 'success':'danger'}}">{{ ucfirst ( $blogdetail->status ) }}</span> 
                                        </td>

                                        <td>
                                            

                                            <a href="/blog/{{$blogdetail->id}}/edit"><button class="btn btn-primary  pull-left"><i class="fa fa-edit"></i></button></a>                                   

                                            
        						
        					   

                    	                  	<form  method="post" action="{{route('blog.destroy', $blogdetail->id)}}" onclick="return confirm('Are you sure?')">
                    	                      @csrf
                    	                      @method('delete')
                    						<button type="submit" class=" btn btn-danger form pull-left"><i class="fa fa-trash"></i></button>

                    						</form>


                                        </td>
                                    </tr>
                                @endforeach        
                            @endif
                            
                        </tbody>
                    </table>
                    {{ $blogData->links() }}
                </div>
            </div>
        </div>
    </div>
    
  
</section>


    @section('scripts')
        <script>
            $(document).ready( function(){
              
            });
          
        </script>
    @endsection


@endsection  



  