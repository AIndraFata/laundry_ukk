@extends('main')

@section('title', 'Edit Paket')

@section('breadcrumbs')
    
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1><i class="fa fa-pencil"></i> Edit Paket</h1>
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
        

        <div class="card-body">

            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <form action="{{ url('paket/'.$paket->id) }}" method="post">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label>Jenis Paket</label>
                            <input type="text" name="jenis" class="form-control" value="{{ $paket->jenis }}" required>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="harga" class="form-control" value="{{ $paket->harga }}" required>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <div class="pull-left">
                <div class="pull-left">
                    <a href="{{ url("paket") }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-undo"></i> Kembali
                    </a>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection