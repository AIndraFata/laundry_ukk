@extends('main')

@section('title', 'Member')

@section('breadcrumbs')
    
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1><i class="menu-icon fa fa-group"></i> Member</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><i class=""></i></li>
                </ol>
            </div>
        </div>
    </div>
</div>

@endsection

@section('content')
    
<div class="content mt-3">

    <div class="card">
        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status')}}
                        </div>
                    @endif
        <div class="card-header">
            <div class="pull-left">
                <strong>Data Member</strong>
            </div>
            
            <div class="pull-right">
                <a href="{{ url('/member/add_member') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> Add
                </a>
            </div>
        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Nomor Telepon</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($member as $item)
                        <tr class="text-center">
                            <td>{{ $loop -> iteration }}</td>
                            <td>{{ $item -> nama }}</td>    
                            <td>{{ $item -> alamat }}</td>
                            <td>{{ $item -> jenis_kelamin }}</td>
                            <td>{{ $item -> no_telp }}</td>
                            <td>
                            <div class="row">
                                <div class="col-md-4 offset-md-4">
                                    <a href="{{ url('member/edit/'.$item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ url('member/'.$item->id) }}" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda Yakin?')">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </form>
                                </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</div>

@endsection