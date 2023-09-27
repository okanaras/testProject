 <!-- burada ilgili frontend kodlari, routingler ve post formu mevcut -->
 
 <!-- her dinamik sayfama bunu ekledim -->
 @extends('master')

 <!--  title yield im  -->

@section('title')
	Create New Employee 
@endsection
		
<!-- css   -->
@section('css') 
@endsection

<!--  main yield start  -->
@section('main')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Employee Add</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <!-- hata alinmasi durumunda ekranda gosterilecek kisim -->
            @if($errors-> any())
              @foreach($errors->all() as $error)
                <div class="alert alert-danger"> {{$error}}</div>
              @endforeach 
            @endif

            <!-- islem basarili ise ekranda gosterilecek kisim -->
            @if(session('success'))
              <div class="alert alert-success"> {{session('success')}}</div>
            @endif
            
          <!-- ekleme islemi icin form olusturuyoruz  -->
          <form action="{{route('employee-add-post')}}" method="post">
            @csrf <!-- bu tokeni hatayi almak icin ekledik -->
						<div class="card">
							<div class="card-body">
								<label class="form-label" for="first_name"> First Name :</label>
								<input class="form-control form-control-lg mb-3" type="text" autocomplete="off" name="first_name" aria-label=".form-control-lg example" required >
								<label class="form-label" for="last_name">Last Name :</label>
								<input class="form-control form-control-lg mb-3" type="text" autocomplete="off" name="last_name" aria-label=".form-control-lg example" required >
								<label class="form-label" for="email">E-Mail :</label>
								<input class="form-control form-control-lg mb-3" type="mail" autocomplete="off" name="email" aria-label=".form-control-lg example" required>
								<label class="form-label" for="phone">Phone :</label>
								<input class="form-control form-control-lg mb-3" type="text" autocomplete="off" maxlength="11" minlength="11" name="phone" aria-label=".form-control-lg example" required >
                <label class="form-label" for="comp_id">Company :</label><br>
                <select class="form-control form-control-lg mb-3" data-placeholder="" name="comp_id" style="width: 100%;" required>
                  <option value="">Select your Company!</option>
                  @foreach($employee as $fk)
                  <option value="{{$fk->id}}">{{$fk->name}}</option>
                  @endforeach
                </select>
                  <div div class="row">
                    <div class="col-12">
                      <a href="{{route('employee-list')}}" class="btn btn-secondary float-left">Cancel</a>
                      <input type="submit" name="ilet"  value="Create" class="btn btn-success float-left ml-2">
                    </div>
                  </div>
                </div>
            </div>
          </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection