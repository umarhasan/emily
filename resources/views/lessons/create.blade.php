@extends('layouts.app')

@section('title')
  Admin | Add lessons
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
            <h1>lessons</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-lessons"><a href="#">Home</a></li>/
              <li class="breadcrumb-lessons active">lessons</li>
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
            <!-- <a href="{{url('admin/add-content')}}">
             <div style="text-align: right;"><button class="btn btn-primary">Add Content</button></div>
            </a> -->

          </div>

          <div class="card-body">
            <!-- @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

          @if($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
          @endif

          @if($message = Session::get('error'))
            <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
          @endif -->


            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
              <li class="nav-lessons">
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
              <form id="quickForm" method="post" action="{{route('lessons.store')}}" >
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="FirstName">Title</label>
                    <input type="text" required  name="title" class="form-control" id="exampleInputEmail1" placeholder="Title">
                  </div>

                  <div class="form-group">
                    <label for="FirstName">Select Course</label>
                    <select class="form-select form-control" aria-label="Default select example" name="course_id">
                    <option value="">Open this select menu</option>
                        @foreach ($courses as $data)
                        <option value="{{$data->id}}">
                            {{$data->title}}
                        </option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="FirstName">Description</label>
                    <textarea type="text" required name="description" class="form-control" id="exampleInputEmail1" placeholder="Enter Description"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="FirstName">Video URL</label>
                    <input type="text" required  name="video_url" class="form-control" id="video_url" placeholder="video url">
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