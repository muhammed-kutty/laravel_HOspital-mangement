@extends('user.main')
@section('content')
    

<div class="container"  style="padding: 72px" >

    @if (session()->has('message'))
    <div class="container alert alert-danger text-center mt-3 mb-2">
      <button class="close" type="button" data-dismiss="alert">X</button>
      {{session()->get('message')}}
    </div>
  @endif
        
        <table class="table text-center table-responsive ">
            <tr>
                <th>Docter Name</th>
                <th>Date</th>
                <th>Message</th>
                <th>Status</th>
                <th>Action</th>

            </tr>
            @foreach ($appointment as $item)
                
            <tr>
                <td>{{$item->docter}}</td>
                <td>{{$item->date}}</td>
                <td>{{$item->message}}</td>
                <td>{{$item->status}}</td>
                <td><a href="{{route('user.cancelappointment',$item->id)}}" class="btn btn-danger" onclick="return confirm('Are You Sure to delete this')">Cancel</a></td>
                
                
            </tr>
            @endforeach
        </table>

</div>




@endsection