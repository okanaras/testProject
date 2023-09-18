 <!-- burada ilgili frontend kodlari ve routing ler mevcut -->
 
 <!-- her dinamik sayfama bunu ekledim -->
 @extends('master') 

<!--  title yield im  -->
@section('title')  
	Dashboard
@endsection

<!-- css   -->
@section('css') 
@endsection

<!--  main yield start  -->
@section('main') 

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Microsoft Admin Panel</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Microsoft v1</li>
          </ol>
        </div>
      </div>
    </div>
  </div>  
      <section>
        <div style="text-align: center; position:relative;">
          <img src="{{asset('backend/mic_logo.png')}}" width="700" height="700" alt="Microsoft logo">
        </div>
      </section>
  
</div>

@endsection
<!-- main yield end -->

<!-- js -->
@section('js')
@endsection