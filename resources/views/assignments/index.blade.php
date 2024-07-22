@extends('layouts.app')

@section('title')
  Admin | item Pages
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>item</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">item</li>
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
                <a href="{{route('item.create')}}">
                <div style="text-align: right;"><button class="btn btn-dark btn-sm">Add <?=$pg?></button></div>
                </a>
              </div>
              <div class="card-body">
                <!-- @if($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif -->
                <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true"><?=$pg?> Page </a>
                  </li>
                </ul>
                <div class="tab-content" id="custom-content-below-tabContent">
                  <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                    <div class="container">
                    <div class="card">
                        <!-- <div class="card-header">
                          <h3 class="card-title">Home Page Data</h3>
                        </div> -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Id</th>
                              <th>Name</th>
                              <th>Description</th>
                              <th>Quantity</th>
                              <th>Price</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach($item as $cat)
                              <tr>
                                <td>{{$cat->id}}</td>
                                <td>{{$cat->name}}</td>
                                <td>{{$cat->description}}</td>
                                <td>{{$cat->quantity}}</td>
                                <td>{{$cat->price}}</td>
                                <td>                        
                                <a class="btn" href="{{route('item.edit',$cat->id)}}"><i style="color: #c49f47;" class="fas fa-pen-square"></i></a>
                                <form action="{{route('item.destroy',$cat->id)}}" method="post">
                                  @csrf
                                  <button class="btn" onclick="return confirm('Are You Sure Want to Delete this.??')">
                                    <i style="color:#bd0a0a;" class="fa fa-trash" aria-hidden="true"></i>
                                  </button> 
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
@endsection
