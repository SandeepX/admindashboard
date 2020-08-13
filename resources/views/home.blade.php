@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-head">
                       
                        <h3>Blog List</h3>
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
    
    </div>
</div>
@endsection
