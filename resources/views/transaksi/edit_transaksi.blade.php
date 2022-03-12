@extends('main')

@section('title', 'Edit Transaksi')

@section('breadcrumbs')
    
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1><i class="fa fa-pencil"></i> Edit Transaksi</h1>
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
                            <label>Nama</label>
                            <input type="text" name="id_member" class="form-control" value="{{ $paket-> }}" required>
                        </div>
                        <div class="form-group">
                            <label>Outlet</label>
                            <input type="text" name="id_outlet" class="form-control" value="{{ $paket-> }}" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tgl" class="form-control" value="{{ $paket-> }}" required>
                        </div>
                        <div class="form-group">
                            <label>Batas Waktu</label>
                            <input type="date" name="batas_waktu" class="form-control" value="{{ $paket-> }}" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Bayar</label>
                            <input type="date" name="tgl_bayar" class="form-control" nullable>
                        </div>
                        <div class="form-group">
                            <label for="selectSm" class=" form-control-label">Status</label>

                              <select name="status" id="selectLg" class="form-control-sm form-control">
                                <option value="0">Pilih Status</option>
                                <option value="Baru">Baru</option>
                                <option value="Proses">Proses</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Diambil">Diambil</option>
                              </select>
                           
                          </div>
                          <div class="form-group">
                            <label for="selectSm" class=" form-control-label">Pembayaran</label>

                              <select name="pembayaran" id="selectLg" class="form-control-sm form-control">
                                <option value="0">Pilih Pembayaran</option>
                                <option value="Dibayar">Dibayar</option>
                                <option value="Belum Dibayar">Belum Dibayar</option>
                              </select>
                           
                          </div>
                        <div class="form-group">
                            <label>User</label>
                            <input type="text" name="id_user" class="form-control" value="{{ $paket-> }}"  required>
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