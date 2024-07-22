@extends('layouts.app')

@section('title')
  Admin | Churches Pages
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
              <li class="breadcrumb-Churches"><a href="#">Home</a>/</li>
              <li class="breadcrumb-Churches active">Churches</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                    <?php 
                          $page = Request::segment(2);
                          $pg = ucfirst($page);
                    ?>
                    <h3 class="card-title">
                      <i class="fas fa-edit"></i>
                      <?=$pg?> Add Details to <?=$pg?> Page
                    </h3>
                    <?php $pageLink = 'admin/'.Request::segment(2).'/add-content'; ?>
                    <a href="{{route('churches.create')}}">
                    <div style="text-align: right;"><button class="btn btn-dark btn-sm">Add churches<?=$pg?></button></div>
                    </a>
              </div>

              <div class="card-body">
                <!-- @if($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                </div>
                @endif -->
               
                <div class="tab-content" id="custom-content-below-tabContent">
                  <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                    <div class="container">
                      <div class="card">
                        <!-- <div class="card-header">
                          <h3 class="card-title">Home Page Data</h3>
                        </div> -->
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone Number</th>
                              <th>Address</th>
                              <th>parish</th>
                              <th>Latitude</th>
                              <th>Longitude</th>
                              <th width="280px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach ($churches as $church)
                                <tr>
                                  <td>{{ $church->name }}</td>
                                  <td>{{ $church->email }}</td>
                                  <td>{{ $church->phone_number }}</td>
                                  <td>{{ $church->address }}</td>
                                  <td>{{ $church->parish }}</td>
                                  <td>{{ $church->latitude }}</td>
                                  <td>{{ $church->longitude }}</td>
                                  <td>
                                  <form action="{{ route('churches.destroy', $church->id) }}" method="POST">
                                      <a class="btn btn-info" href="{{ route('churches.show', $church->id) }}">Show</a>
                                      <a class="btn btn-primary" href="{{ route('churches.edit', $church->id) }}">Edit</a>
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger">Delete</button>
                                  </form>
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                            
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection
