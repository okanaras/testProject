@extends('master')

@section('title')
{{ $employee-> first_name}} {{ $employee-> last_name}} | Info
@endsection

@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{asset('/backend/dist')}}/img/user4-128x128.jpg" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $employee-> first_name}} {{ $employee-> last_name}} </h3>

                <p class="text-muted text-center">{{ $employee-> email}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item"><b>Worker ID</b> <a class="float-right">{{ $employee-> id}} </a></li>
                  <li class="list-group-item"><b>Age</b> <a class="float-right">{{ rand(18,34)}}</a></li>
                  <li class="list-group-item"><b>Working Since</b> <a class="float-right">{{date("Y") - rand(1,15)}}</a></li>
                </ul>

              <input type="text" disabled value="Follow" class="btn btn-primary btn-block"></input>
            </div>
          <!-- /.card-body -->
          </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="first_name" class="col-sm-2 col-form-label">Name :</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="first_name" placeholder="Name" disabled	value=" {{ $employee-> first_name}}  " >
                          </div>
                      </div>
                      <div class="form-group row">
                        <label for="last_name" class="col-sm-2 col-form-label">Last Name :</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="last_name" placeholder="last_name" disabled	value=" {{ $employee-> last_name}}  " >
                      </div>
                    </div>
                      <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone :</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="phone" placeholder="Phone" disabled	value=" {{ $employee-> phone}}  " >
                        </div>
                    </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">E-Mail :</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="email" placeholder="Email" disabled	value=" {{ $employee-> email}}  " >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="comp_id" class="col-sm-2 col-form-label">Company ID :</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="comp_id" placeholder="comp_id" disabled	value=" {{ $employee-> comp_id}}  " >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <a href="{{route('employee-list')}}"><input type="button" class="btn btn-danger px-4" value="Back" /></a>
                          </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              
            </div>
            </div>
          </div>

        </div>
      </div>
    </section>

</div>
@endsection