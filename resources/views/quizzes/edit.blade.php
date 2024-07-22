@extends('layouts.app')

@section('title')
Admin | Edit quizzes
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
            <h1>quizzes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-quizzes"><a href="#">Home</a></li>
              <li class="breadcrumb-quizzes active">quizzes</li>
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
                  <li class="nav-quizzes">
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
                      <form id="quickForm" method="post" action="{{route('quizzes.update',$quiz->id)}}" >
                        @csrf
                        @method('put')
                        <div class="card-body">
                          <div class="form-group">
                            <label for="FirstName">Title</label>
                            <input type="text" required  name="title" value="{{$quiz->title}}" class="form-control" id="exampleInputEmail1" placeholder="Enter quizzes">
                          </div>
                          <div class="form-group">
                                    <label for="FirstName">Select Course</label>
                                    <select class="form-select form-control" aria-label="Default select example" name="course_id">
                                        <option value="">Open this select menu</option>
                                        @foreach ($course as $data)
                                        <option value="{{ $data->id }}" {{ $data->id == $quiz->course_id ? 'selected' : '' }}>{{$data->title}}</option>
                                      @endforeach
                                    </select>
                          </div>
                          <div class="form-group">
                            <label for="FirstName">Description</label>
                            <input type="text" required  name="description" value="{{$quiz->description}}" class="form-control" id="exampleInputEmail1" placeholder="Description">
                          </div>
                          <div class="form-group">
                            <label for="FirstName">Time Limit</label>
                            <input type="text" required name="time_limit" value="{{$quiz->time_limit}}" class="form-control" placeholder="5 mint">
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
          </div>
        </div>
      </div>
    <section>
</div>


@endsection