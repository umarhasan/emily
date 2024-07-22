@extends('layouts.app')

@section('title')
  Admin | Quizzes Pages
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quizzes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-quizzes"><a href="#">Home</a></li>
              <li class="breadcrumb-quizzes active">/Quizzes</li>
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
                <?php 
                      $page = Request::segment(2);
                      $pg = ucfirst($page);
                ?>
                <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                  <?=$pg?> Add Details to <?=$pg?> Page
                </h3>
                <?php $pageLink = 'admin/'.Request::segment(2).'/add-content'; ?>
                <a href="{{route('quizzes.create')}}">
                <div style="text-align: right;"><button class="btn btn-dark btn-sm">Add Quaizee <?=$pg?></button></div>
                </a>
              </div>

              <div class="card-body">
               
                <div class="tab-content" id="custom-content-below-tabContent">
                  <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                    <div class="container">
                      
                      <div class="card">
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Description</th>
                              <th>Time Limit</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach($quiz as $cat)
                              <tr>
                              <td>{{$cat->id}}</td>
                              <td>{{$cat->title}}</td>
                              <td>{{$cat->description}}</td>
                              <td>{{$cat->time_limit}} Mint</td>
                              <td>                        
                                <a class="btn" href="{{route('quizzes.edit',$cat->id)}}"><i  class="fas fa-pen-square"></i></a>
                                <a class="btn" href="{{route('quizzes.show',$cat->id)}}"><i class="fa fa-eye"></i></a>
                                <a class="btn" href="{{route('quizzes.delete',$cat->id)}}"><i class="fa fa-trash"></i></a>
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
              <!-- /.card -->
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection
