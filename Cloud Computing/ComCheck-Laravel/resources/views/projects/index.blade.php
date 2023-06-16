@extends('layouts.base')
@section('title')
Projects
@endsection

@section('content-header')
<div class="container-fluid">
  <!-- Info boxes -->
  <div class="row">
    <div class="col-12 col-sm-6 col-md-4">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Users</span>
          <span class="info-box-number">
            {{$countUser}}
            <small> User</small>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-4">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-link"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Channel</span>
          <span class="info-box-number">{{$countChannel}} <small> Channel</small></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-4">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-comments"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Sentimen</span>
          <span class="info-box-number"> {{$countSentimen}} <small> Sentimen</small></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <div class="row mb-2">
    <div class="col-sm-12">
      <h1>List User ComCheck</h1>
    </div>
    @if (session('success'))
    <div class="col-sm-12 mt-2">
      <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
    @elseif(session('error'))
    <div class="col-sm-12 mt-2">
      <div class="alert alert-danger alert-dismissible fade show">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
    @endif
    {{-- buat tabel list project --}}
    <div class="col-sm-12">
      <div class="d-flex justify-content-between mt-2">
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addProjectModal">Add</a>
      </div>
      <table id="example2" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email}}</td>
            <td>{{ $user->phone}}</td>
            <td>
              <a href="{{ route('projects.detail',['id_user'=>$user->id_user]) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
              <!-- <a href="#" data-toggle="modal" data-target="#editProjectModal"
                  class="btn btn-warning"><i class="fas fa-edit"></i></a> -->
              <form action="" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data?')"><i class="fas fa-trash"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div><!-- /.container-fluid -->

{{-- Modal Add --}}
<div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog" aria-labelledby="addProjectModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProjectModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route ('projects.store') }}" method="POST">
          @csrf
          <div class="col-md-12">
            <div class="form-group">
              <label for="clientName">Name</label>
              <input type="text" class="form-control" id="clientName" placeholder="Name User" name="name" required>
            </div>
            <div class="form-group">
              <label for="projectTitle">Email</label>
              <input type="email" class="form-control" id="projectTitle" placeholder="Email User" name="email" required>
            </div>
            <div class="form-group">
              <label for="projectTitle">Nomor Handphone</label>
              <input type="text" class="form-control" id="projectTitle" placeholder="0828..." name="phone" required>
            </div>
            <div class="form-group">
              <label for="projectTitle">Password</label>
              <input type="password" class="form-control" id="projectTitle" placeholder="Password" name="password" required>
            </div>
            <div class="col-md-12 text-right">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>



@endsection