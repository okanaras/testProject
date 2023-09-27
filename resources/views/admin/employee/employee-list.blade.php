@extends('master')

@section('title')
	Employee List
@endsection


@section('css')
@endsection


@section('main')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Employee List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
				<div class="card-header">
				  	<a href="{{route('employee-add')}}" class="btn btn-warning btn-sm">Create New</a>
					<hr>
			@if(session('success'))
				<div class="alert alert-success"> {{session('success')}}</div>
			@endif
                </div>
              <!-- /.card-header -->
				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>E-Mail</th>
								<th>Phone</th>
								<th>Company ID</th>
								<th>Created</th>
								<th>Updated</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@if($employee)
							@foreach($employee as $emp)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $emp-> first_name }}</td>
								<td>{{ $emp-> last_name }}</td>
								<td>{{ $emp-> email }}</td>
								<td>{{ $emp-> phone }}</td>
								<td>{{ $emp-> comp_id }}</td>
								<td>{{ $emp-> created_at }}</td>
								<td>{{ $emp-> updated_at }}</td>
								<td style="text-align: center;">
									<a href="{{route('employee-show',$emp->id)}}"
										class="btn btn-info btn-sm">Info</a>
									<a href="{{route('employee-edit',$emp->id)}}"
										class="btn btn-secondary btn-sm">Edit</a>
									<a href="{{route('employee-delete',$emp->id)}}"
										class="btn btn-danger btn-sm">Delete</a>
								</td>
							</tr>
							@endforeach
							@endif
						</tbody>
						<tfoot>
							<tr>
							<th>#</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>E-Mail</th>
								<th>Phone</th>
								<th>Company ID</th>
								<th>Created</th>
								<th>Updated</th>
								<th>Actions</th>
							</tr>
						</tfoot>
					</table>
				 <!-- /.card-body -->
				</div>
					<!-- /.card -->
			</div>
				<!-- /.col -->
		</div>
				<!-- /.row -->
	    </div>
      <!-- /.container-fluid -->
   </section>
    <!-- /.content -->
 </div>
  <!-- /.content-wrapper -->
@endsection

@section('js')

@endsection