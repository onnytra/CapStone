@extends('layouts.base')
@section('title')
Detail
@endsection
@section('content-header')
<div class="container-fluid">
    <div class="container">
        <h1>User Details</h1>
        <div class="row">
            <div class="col-md-6">
                <p><strong>ID:</strong> {{ $users->id_user }}</p>
                <p><strong>Name:</strong> {{ $users->name }}</p>
                <p><strong>Email:</strong> {{ $users->email }}</p>
                <p><strong>Phone:</strong> {{ $users->phone }}</p>
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
            <div class="col-md-12">
                <div class="d-flex justify-content-between mt-2">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addProjectModal">Add</a>
                </div>
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Channel</th>
                            <th>Link Konten</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($channels as $channel)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $channel->channel }}</td>
                            <td><a href="https://youtu.be/{{ $channel->link_konten}}">{{ $channel->link_konten}}</a></td>
                            <td>
                                <a href="{{ route('projects.senti',['id_channel'=>$channel->id_channel]) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                <!-- <a href="#" data-toggle="modal" data-target="#editProjectModal" class="btn btn-warning"><i class="fas fa-edit"></i></a> -->
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
            {{-- make button back in right --}}
            <div class="col-md-12 text-right">
                <a href="{{ route('projects.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</div>
{{-- Modal Add --}}
<div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog" aria-labelledby="addProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProjectModalLabel">Add Channel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route ('projects.storechannel') }}" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="clientName">Channel</label>
                            <input type="text" class="form-control" id="clientName" placeholder="Channel" name="channel" required>
                        </div>
                        <div class="form-group">
                            <label for="projectTitle">Link Konten</label>
                            <input type="text" class="form-control" id="projectTitle" placeholder="https://youtu.be/Ze1I3TgHrr4" name="link_konten" required>
                        </div>
                        <input type="hidden" class="form-control" id="projectTitle" placeholder="" name="id_user" value="{{ $users->id_user }}" required>
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection