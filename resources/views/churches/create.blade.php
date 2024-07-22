@extends('layouts.app')

@section('title')
Admin | Edit Churches
@endsection
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Churches</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Churches</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <div class="card card-primary card-outline">
                <div class="card-header">
            
                    <!-- form start -->
                    <form action="{{ route('churches.store') }}" method="POST">
                      @csrf
                      <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" class="form-control" placeholder="Name">
                                    </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Phone Number:</strong>
                                        <input type="text" name="phone_number" class="form-control" placeholder="Phone Number">
                                    </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Address:</strong>
                                        <textarea class="form-control" style="height:150px" name="address" placeholder="Address"></textarea>
                                    </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Parish:</strong>
                                        <input type="text" name="parish" class="form-control" placeholder="Parish">
                                    </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Vicar:</strong>
                                        <input type="text" name="vicar" class="form-control" placeholder="Vicar">
                                    </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Parent/Guardian Name:</strong>
                                        <input type="text" name="parent_guardian_name" class="form-control" placeholder="Parent/Guardian Name">
                                    </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Enrolled Before:</strong>
                                        <input type="radio" name="enrolled_before" value="1"> Yes
                                        <input type="radio" name="enrolled_before" value="0" checked> No
                                    </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Enrolled Date:</strong>
                                        <input type="date" name="enrolled_date" class="form-control">
                                    </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Talents:</strong>
                                        <textarea class="form-control" style="height:150px" name="talents" placeholder="Talents"></textarea>
                                    </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Youth Group Role:</strong>
                                        <textarea class="form-control" style="height:150px" name="youth_group_role" placeholder="Youth Group Role"></textarea>
                                    </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Born Again Christian:</strong>
                                        <input type="radio" name="born_again_christian" value="1"> Yes
                                        <input type="radio" name="born_again_christian" value="0" checked> No
                                    </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Salvation Testimony:</strong>
                                        <textarea class="form-control" style="height:150px" name="salvation_testimony" placeholder="Salvation Testimony"></textarea>
                                    </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                      </div>
                    </form>
                  </div>
                

                </div>
              
              </div>
           </div>
        </div>
      </div>
@endsection
