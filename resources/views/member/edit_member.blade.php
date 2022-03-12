@extends('main')

@section('title', 'Edit Member')

@section('breadcrumbs')
    
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1><i class="fa fa-pencil"></i> Edit Member</h1>
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
                    <form action="{{ url('member/'.$member->id) }}" method="post">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ $member->nama }}" autofocus required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" required>{{ $member->alamat }}</textarea>
                        </div>
                        {{-- <div class="form-group">
                            <label for="disabledSelect" class="form-control-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="disabledSelect" disabled="" class="form-control">
                                <option value="">
                                    Pilih Jenis Kelamin
                                </option>
                                <option value="Laki-Laki" {{ old('jenis_kelamin', $member->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>
                                    Laki-Laki
                                </option>
                                <option value="Perempuan" {{ old('jenis_kelamin', $member->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label for="selectSm" class=" form-control-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="selectLg" class="form-control-sm form-control">
                            <option value="">
                                Pilih Jenis Kelamin
                            </option>
                            <option value="Laki-Laki" {{ old('jenis_kelamin', $member->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>
                                Laki-Laki
                            </option>
                            <option value="Perempuan" {{ old('jenis_kelamin', $member->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan
                            </option>
                            </select>
                        </div>
                        {{-- <div class="form-group">
                            <label for="disabledSelect" class=" form-control-label">Jenis Kelamin</label></div>
                              <select name="jenis_kelamin" disabled="" class="form-control">
                                <option value="">Pilih Jenis Kelamin</option>
                                @foreach ($member as $item)
                                    <option value="{{ $item->jenis_kelamin }}">{{ $item->jenis_kelamin }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input type="text" name="no_telp" class="form-control" value="{{ $member->no_telp }}" required>
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