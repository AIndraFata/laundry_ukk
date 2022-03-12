<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Carbon;
// use Carbon\Carbon;

class TransaksiController extends Controller
{
    public function show_add()
    {
        return view('transaksi.add_transaksi');
    }

    public function show_edit($id)
    {
        $transaksi = DB::table('transaksi')->where('id', $id)->first();
        return view('transaksi/edit_transaksi', compact('transaksi'));
    }

    public function tambah(Request $request)
    {   
        // $date       = Carbon::now();
        // $expired    = $date->addDays(5); 

        $validator=Validator::make($request->all(),
            [
                'id_member'     => 'required',
                'id_outlet'     => 'required',
                // 'tgl'           =>  $date,
                // 'batas_waktu'   =>  $expired,
                'tgl'           => 'required',
                'batas_waktu'   => 'required',
                'tgl_bayar'     => 'required'->nullable(),
                'status'        => 'required',
                'pembayaran'    => 'required',
                'id_user'       => 'required'
            ]
        );

        if($validator->fails()) {
            return Response()->json($validator->errors);
        }

        $simpan = Transaksi::create([
            'id_member'     => $request->id_member,
            'id_outlet'     => $request->id_outlet,
            'tgl'           => $request->tgl,
            'batas_waktu'   => $request->batas_waktu,
            'tgl_bayar'     => $request->tgl_bayar,
            'status'        => $request->status,
            'pembayaran'    => $request->pembayaran,
            'id_user'       => $request->id_user
        ]);

        if($simpan)
        {
            // return Response()->json(['Messages' => 'Data berhasil ditambahkan']);
        }
        else 
        {
            return Response()->json(['Messages' => 'Data berhasil ditambahkan']);
        }

        return redirect('transaksi')->with('status', 'Transaksi Berhasil Ditambahkan!');
    }

    public function tampilall()
    {
        $show = Transaksi::all();
        // return Response()->json($show);
        return view('transaksi.home_transaksi', ['transaksi' => $show]);
    }

    public function tampil($id)
    {
        $show = Transaksi::where('id', $id);
        return Response()->json($show);
    }

    public function update($id, Request $request)
    {   
        $v=Validator::make($req->all(),
        [
                'id_member'     => 'required',
                'id_outlet'     => 'required',
                // 'tgl'           =>  $date,
                // 'batas_waktu'   =>  $expired,
                'tgl'           => 'required',
                'batas_waktu'   => 'required',
                'tgl_bayar'     => 'required',
                'status'        => 'required',
                'pembayaran'    => 'required',
                'id_user'       => 'required'
        ]);

        if($v->fails())
        {
            return Response()->json($v->errors());
        }

        $ganti = Transaksi::where('id', $id)->update([
                'id_member'     => $request->id_member,
                'id_outlet'     => $request->id_outlet,
                // 'tgl'           =>  $date,
                // 'batas_waktu'   =>  $expired,
                'tgl'           => $request->tgl,
                'batas_waktu'   => $request->batas_waktu,
                'tgl_bayar'     => $request->tgl_bayar,
                'status'        => $request->status,
                'pembayaran'    => $request->pembayaran,
                'id_user'       => $request->id_user
        ]);

        if($ganti)
        {
            // return Response()->json(['status' => 'Data Berhasil Diupdate']);
        }
        else
        {
            return Response()->json(['status' => 'Data Berhasil Ditambahkan']);
        }
        return redirect('transaksi')->with('status', 'Transaksi Berhasil Diupdate!');
    }

    public function destroy($id)
    {
        $hapus = Transaksi::where('id', $id)->delete();
        // if($hapus)
        // {
        //     return Response()->json(['Messages' => 'Data berhasil dihapus']);
        // }
        // else
        // {
        //     return Response()->json(['Messages' => 'Data gagal dihapus']);
        // }

        return redirect('/transaksi');
    }
}
