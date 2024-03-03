@extends('admin.main')

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Docter Form</h1>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Docters</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('admin.upload_docts')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body text-center">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Docters Name</label>
                    <input type="text" name="doct_name" class="form-control text-center" id="exampleInputEmail1" placeholder="Enter Docter Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Phone Number</label>
                    <input type="text" name="phone_num" class="form-control text-center" id="exampleInputPassword1" placeholder="Phone Number">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Speciality in</label>
                    <select name="speciality" class="form-control">
                        <option value="" class="text-center">--select--</option>
                        <option class="text-center" value="skin">Skin</option>
                        <option class="text-center"  value="heart">Heart</option>
                        <option class="text-center" value="eye">Eye</option>
                        <option class="text-center" value="Ent">ENT</option>
                        <option class="text-center" value="surgon">Surgon</option>

                    </select>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Room Number</label>
                        <input type="text" name="room" class="form-control text-center" id="exampleInputPassword1" placeholder="Docter Room Number">
                      </div>
                  </div>
                  <div class="form-group">
                    <label >Docter Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" >
                        <label class="custom-file-label" >Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-primary " style="width: 25%;height: 45px;">Submit</button>
                </div>
              </form>
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