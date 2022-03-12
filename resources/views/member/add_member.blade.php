@extends('main')

@section('title', 'Tambah Member')

@section('breadcrumbs')
    
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1><i class="fa fa-plus"></i> Tambah Member</h1>
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
                    <form action="{{ url('member/add') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" autofocus required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="selectSm" class=" form-control-label">Jenis Kelamin</label>

                              <select name="jenis_kelamin" id="selectLg" class="form-control-sm form-control">
                                <option value="0">Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                              </select>
                           
                          </div>
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input type="text" name="no_telp" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <div class="pull-left">
                <div class="pull-left">
                    <a href="{{ url("member") }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-undo"></i> Kembali
                    </a>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection