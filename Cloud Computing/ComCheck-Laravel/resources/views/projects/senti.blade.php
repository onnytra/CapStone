@extends('layouts.base')
@section('title')
Detail
@endsection
@section('content-header')
<div class="container-fluid">
    <div class="container">
        <h1>Channel Details</h1>
        <div class="row">
            <div class="col-md-6">
                <p><strong>ID:</strong> {{ $channels->id_channel }}</p>
                <p><strong>Channel:</strong> {{ $channels->channel }}</p>
                <p><strong>Link Konten:</strong> {{ $channels->link_konten }}</p>
            </div>
            <div class="col-md-12">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Sentimen</th>
                            <th>Label</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sentimen as $sentimen)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sentimen->sentimen }}</td>
                            <td>{{ $sentimen->label }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- make button back in right --}}
            <div class="col-md-12 text-right">
                <!-- make butto back -->
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection