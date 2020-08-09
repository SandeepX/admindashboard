@extends('layout.admin')

@section('title','Contact page')

@section('main-content')
  <section class="content">

  
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">subject</th>
              <th scope="col">Message</th>
              <th scope="col">Action</th>

            </tr>
          </thead>
          <tbody>
    @if(isset($messages))
            @foreach($messages as $key=>$detail)
              <tr>
                <th scope="row">{{$detail->name}}</th>
                <td>{{$detail->email}}</td>
                <td>{{$detail->subject}}</td>
                <td><p>{{$detail->message}}<p></td>
                <td>
                  <form class="m-2" method="post" action="{{route('contactdelete', $detail->id)}}">
                    @csrf
                    @method('delete')

                    <button type="submit" class="btn btn-danger">Delete</button>

                  </form>
              </td>

              </tr>
            @endforeach
          </tbody>
      </table>
    @endif      
  </section>
@endsection  



  