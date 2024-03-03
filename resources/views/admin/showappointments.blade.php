@extends('admin.main')

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Appointmet Table</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Docter Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if (session()->has('message'))
    <div class="alert alert-success text-center">
        <button class="close" type="button" data-dismiss="alert">X</button>
        {{session()->get('message')}}
    </div>
        
    @endif

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary ">
              <div class="card-header ">
                <h3 class="card-title font-weight-bolder  ">Appointments</h3>
              </div>
              <!-- /.card-header -->
              
                    <table class="table text-center table-responsive  ">
                        <thead>
                        <tr class="border-spacing-11" style="width: 50px">
                            <th scope="col" >No</th>
                            <th scope="col" >Patient Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Docter Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Message</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
            
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($data as $item)
                                
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                <td>Dr.{{$item->docter}}</td>
                                <td>{{$item->date}}</td>
                                <td>{{$item->message}}</td>
                                <td >{{$item->status}}</td>
                                <td>
                                    <a href="{{route('admin.approveappointment',$item->id)}}" class="btn btn-primary" >Aproove</a>
                                    <a href="{{route('admin.deleteappointment',$item->id)}}" class="btn btn-danger" >Cancel</a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection