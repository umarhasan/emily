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
            <h1>Churchess</h1>
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
            <div class="card">
<div class="card card-primary card-outline">
          <div class="card-header">
           
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Churches Add Details to Churches Page
            </h3>
            <!-- <a href="{{url('admin/add-content')}}">
             <div style="text-align: right;"><button class="btn btn-primary">Add Content</button></div>
            </a> -->

          </div>

          <div class="card-body">
          	@if(count($errors) > 0)
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
          @endif


            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Home Page </a>
              </li>
             
            </ul>

           <br>

            <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Churches Content</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             <form action="{{ route('churches.update', $church->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Name:</strong>
                          <input type="text" name="name" value="{{ $church->name }}" class="form-control" placeholder="Name">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Email:</strong>
                          <input type="email" name="email" value="{{ $church->email }}" class="form-control" placeholder="Email">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Phone Number:</strong>
                          <input type="text" name="phone_number" value="{{ $church->phone_number }}" class="form-control" placeholder="Phone Number">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Address:</strong>
                          <textarea class="form-control" style="height:150px" name="address" placeholder="Address">{{ $church->address }}</textarea>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Parish:</strong>
                          <input type="text" name="parish" value="{{ $church->parish }}" class="form-control" placeholder="Parish">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Vicar:</strong>
                          <input type="text" name="vicar" value="{{ $church->vicar }}" class="form-control" placeholder="Vicar">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Parent/Guardian Name:</strong>
                          <input type="text" name="parent_guardian_name" value="{{ $church->parent_guardian_name }}" class="form-control" placeholder="Parent/Guardian Name">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Enrolled Before:</strong>
                          <input type="radio" name="enrolled_before" value="1" {{ $church->enrolled_before ? 'checked' : '' }}> Yes
                          <input type="radio" name="enrolled_before" value="0" {{ !$church->enrolled_before ? 'checked' : '' }}> No
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Enrolled Date:</strong>
                          <input type="date" name="enrolled_date" value="{{ $church->enrolled_date }}" class="form-control">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Talents:</strong>
                          <textarea class="form-control" style="height:150px" name="talents" placeholder="Talents">{{ $church->talents }}</textarea>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Youth Group Role:</strong>
                          <textarea class="form-control" style="height:150px" name="youth_group_role" placeholder="Youth Group Role">{{ $church->youth_group_role }}</textarea>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Born Again Christian:</strong>
                          <input type="radio" name="born_again_christian" value="1" {{ $church->born_again_christian ? 'checked' : '' }}> Yes
                          <input type="radio" name="born_again_christian" value="0" {{ !$church->born_again_christian ? 'checked' : '' }}> No
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Salvation Testimony:</strong>
                          <textarea class="form-control" style="height:150px" name="salvation_testimony" placeholder="Salvation Testimony">{{ $church->salvation_testimony }}</textarea>
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
          <!-- /.card -->
        </div>

@endsection
