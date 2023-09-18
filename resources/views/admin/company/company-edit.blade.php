 <!-- burada ilgili frontend kodlari, routingler ve post formu mevcut -->
 
 <!-- her dinamik sayfama bunu ekledim -->
 @extends('master')

 <!--  title yield im  -->
@section('title')
	Edit Company 
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
            <h1>Edit Company </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Company</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
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

            <!-- gerekli routing nameleri verildi ve dosya almak icin enctype eklendi  burada id yide verdik ve formlarda value degerini compacttan gelen degiskenle ekledik-->

			<form action="{{route('company-edit-post',$company->id)}}" method="post" enctype="multipart/form-data">
				@csrf <!-- bu tokeni hatayi almak icin ekledik -->
				<div class="card">
					<div class="card-body">
						<label class="form-label" for="name">Name :</label>
						<input class="form-control form-control-lg mb-3" type="text" value=" {{ $company-> name}} " autocomplete="off" name="name" aria-label=".form-control-lg example" required >
						<label class="form-label" for="address">Address :</label>
						<input class="form-control form-control-lg mb-3" type="text" value=" {{ $company-> address}} " autocomplete="off" name="address" aria-label=".form-control-lg example" >
						<label class="form-label" for="phone">Phone :</label>
						<input class="form-control form-control-lg mb-3" type="text" value=" {{ $company-> phone}} " autocomplete="off" maxlength="11" minlength="11" name="phone" aria-label=".form-control-lg example" >
						<label class="form-label" for="email">E-Mail :</label>
						<input class="form-control form-control-lg mb-3" type="mail" value=" {{ $company-> email}} " autocomplete="off" name="email" aria-label=".form-control-lg example">

						<label class="form-label" for="logo">Logo :</label>
						<input class="form-control form-control-lg mb-3" type="file" value=" {{ $company-> logo}} " name="logo" aria-label=".form-control-lg example" required >

						<label class="form-label" for="web_site">Web Site :</label>
						<input class="form-control form-control-lg mb-3" type="text" value=" {{ $company-> web_site}} " name="web_site" aria-label=".form-control-lg example" >
						<div class="row">
							<div class="col-12">
							<a href="{{route('company-list')}}" class="btn btn-secondary float-left">Cancel</a>
							<input type="submit" name="ilet"  value="Update" class="btn btn-success float-left ml-2">
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