@extends('layouts.app')

@section('title')
  Admin | Add Quizze
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
            <h1>Quizze</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-quizzes"><a href="#">Home</a></li>
              <li class="breadcrumb-quizzes active"> /Quizze</li>
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
                  {{$pg}} Quizze
                </h3>
              </div>

              <div class="card-body">
              
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
                      <form id="quickForm" method="post" action="{{route('quizzes.store')}}" >
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label for="FirstName">Title</label>
                            <input type="text" required  name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Quizze">
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
                            <textarea type="text" required  name="description" class="form-control" id="exampleInputEmail1" placeholder="Enter Description"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="FirstName">Time Limit</label>
                            <input type="text" required name="time_limit" class="form-control" placeholder="5 mint">
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
      </section>
  </div>


@endsection