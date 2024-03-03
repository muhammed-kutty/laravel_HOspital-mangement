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
                            <th scope="col">Image</th>
                            <th scope="col" >Docter Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">speciality</th>
                            <th scope="col">Room No.</th>
                            <th scope="col">Action</th>
            
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($data as $item)
                                
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td><img src="docterimage/{{$item->image}}" style="width: 80px" alt="photo"></td>
                                <td>{{$item->doct_name}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->speciality}} .Specialist</td>
                                <td>{{$item->room}}</td>
                                <td>
                                    <a href="{{route('admin.edittedocters',$item->id)}}" class="btn btn-primary" >Edit</a>
                                    <a href="{{route('admin.deletedocters',$item->id)}}" onclick="return confirm('Are You Sure to delete this')" class="btn btn-danger" >Delete</a>
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