@extends('layouts.app')

@section('title')
  Admin | Add Lessons
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
            <h1>Show Lessons</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">show/Lessons</li>
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
        
            <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
            

                <div class="card-body">

                  <div class="form-group">
                    <label for="FirstName">lessons Title</label>
                    <input type="text" required  name="lessons_name" value="{{ $lessons->title}}" class="form-control" id="exampleInputEmail1" placeholder="Enter lessons">
                  </div>
                  <div class="form-group">
                    <label for="FirstName">Description</label>
                    <textarea  name="lessons_name" class="form-control">{{$lessons->description}}</textarea>
                  </div>
                  <div class="form-group">
                    <label>Video URL</label>
                    <input type="text" required  name="lessons_name" value="{{ $lessons->video_url}}" class="form-control" id="exampleInputEmail1" placeholder="Enter lessons">
                  </div>

                </div>
               
            </div>
          

          </div>
          
        </div>

            
            
          </div>
          <!-- /.card -->
        </div>
</section>
        </div>


@endsection