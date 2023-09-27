<!-- burada ilgili frontend kodlari, routingler mevcut -->
 
 <!-- her dinamik sayfama bunu ekledim -->
 @extends('master')

 <!--  title yield im  -->

 @section('title')
	Company List
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
            <h1>Company List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Company List</li>
            </ol>
          </div>
        </div>
      </div>
    </section>


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card">
				<div class="card-header">
				  	<a href="{{route('company-add')}}" class="btn btn-warning btn-sm">Create New</a>
					<hr>
			@if(session('success'))
				<div class="alert alert-success"> {{session('success')}}</div>
			@endif
              </div>
              
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>	
							<th>#</th>
							<th>Name</th>
							<th>Address</th>
							<th>Phone</th>
							<th>E-Mail</th>
							<th>Logo</th>
							<th>Web Site</th>
							<th>Created</th>
							<th>Updated</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<!-- foreach dongusu ile butun verilerimizi cektik loop-iteration ile oto inc aldik  -->
						@if($company)
							@foreach($company as $comp)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $comp-> name }}</td>
								<td>{{ $comp-> address }}</td>
								<td>{{ $comp-> phone }}</td>
								<td>{{ $comp-> email }}</td>
								<td>
									<img src="{{ asset('uploads/companies/'. $comp->logo) }}" alt="...logo bulunamadi" width="100" height="100">
								</td>
								<td>{{ $comp-> web_site }}</td>
								<td>{{ $comp-> created_at }}</td>
								<td>{{ $comp-> updated_at }}</td>
								<td style="text-align: center; width:150px;">
								<a href="{{route('company-show',$comp->id)}}"
									class="btn btn-info btn-sm">Info</a>
								<a href="{{route('company-edit',$comp->id)}}"
									class="btn btn-secondary btn-sm">Edit</a>
								<a href="{{route('company-delete',$comp->id)}}"
									class="btn btn-danger btn-sm">Delete</a>
								</td>
							</tr>
							@endforeach
						@endif
					</tbody>
					<tfoot>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Address</th>
							<th>Phone</th>
							<th>E-Mail</th>
							<th>Logo</th>
							<th>Web Site</th>
							<th>Created</th>
							<th>Updated</th>
							<th>Action</th>
						</tr>
					</tfoot>
            </table>
          
        </div>
            
        </div>
          
    </div>
       
</div>

    </section>

  </div>

@endsection

@section('js')

@endsection