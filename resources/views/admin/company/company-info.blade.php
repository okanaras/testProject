<!-- burada ilgili frontend kodlari, routingler ve formlar mevcut -->
 
 <!-- her dinamik sayfama bunu ekledim -->
 @extends('master')

 <!--  title yield im  -->

 @section('title')
{{ $company-> name}} | Info
@endsection
		
<!-- css   -->
@section('css') 
@endsection

<!--  main yield start  -->
@section('main') 
  
<div class="content-wrapper">
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
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset( $company->logo )}}"
                       alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{ $company-> name}}</h3>
                <p class="text-muted text-center">{{ $company-> email}}</p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Company ID</b> <a class="float-right">{{ $company-> id}} </a>
                  </li>
                  <li class="list-group-item">
                    <b>Workers</b> <a class="float-right">{{ rand(1,100)}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Since</b> <a class="float-right">{{date("Y") - rand(10,30)}}</a>
                  </li>
                </ul>
                <input type="text" disabled value="Follow" class="btn btn-primary btn-block"></input>
              </div>
            </div>
          </div>

          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div>

              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name :</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="name" placeholder="Name" disabled	value=" {{ $company-> name}}  " >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Address :</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="address" placeholder="Address" disabled	value=" {{ $company-> address}}  " >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone :</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="phone" placeholder="Phone" disabled	value=" {{ $company-> phone}}  " >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">E-Mail :</label>
                        <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="Email" disabled value=" {{ $company-> email}}  " >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="logo" class="col-sm-2 col-form-label">Logo :</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="logo" placeholder="Logo" disabled	value=" {{ $company-> logo}}  " >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="web_site" class="col-sm-2 col-form-label">Web Site :</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="web_site" placeholder="Web Site" disabled	value=" {{ $company-> web_site}}  " >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
						<a href="{{route('company-list')}}"><input type="button" class="btn btn-danger px-4" value="Back" /></a>
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