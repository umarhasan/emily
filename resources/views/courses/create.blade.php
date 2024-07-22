@extends('layouts.app')

@section('title')
  Admin | Add courses
@endsection

@section('content')

<?php 
$page = Request::segment(2);
$pg = ucfirst($page);
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>courses</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-courses"><a href="#">Home</a></li>&nbsp;
              <li class="breadcrumb-courses active">courses</li>
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
<div class="card card-primary card-outline">
          <div class="card-header">
           
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              {{$pg}} Add Details to {{$pg}} Page
            </h3>
           

          </div>

          <div class="card-body">
        


            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
              <li class="nav-courses">
                <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">{{$pg}} Page </a>
              </li>
             
            </ul>

           <br>

            <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{$pg}} Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="post" action="{{route('courses.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="FirstName">courses Name</label>
                    <input type="text" required  name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter courses">
                  </div>

                  <div class="form-group">
                    <label for="FirstName">Description</label>
                    <textarea type="text" required  name="description" class="form-control" id="exampleInputEmail1" placeholder="Enter Description"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="FirstName">Image</label>
                    <input type="file" required  name="image" class="form-control" id="exampleInputEmail1" placeholder="Enter Qty">
                  </div>
 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          

          </div>
          
        </div>

            
            
          </div>
          <!-- /.card -->
        </div>
</section>
        </div>


@endsection