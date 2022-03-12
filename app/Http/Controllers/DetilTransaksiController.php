<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\detil_transaksi;
use App\Models\Transaksi;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Validator;

class DetilTransaksiController extends Controller
{
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
            [
                'id_transaksi'  => 'required',
                'id_paket'      => 'required',
                'qty'           => 'required'
            ]
        );

        if($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $simpan = detil_transaksi::create([
            'id_transaksi'  => $request->id_transaksi,
            'id_paket'      => $request->id_paket,
            'qty'           => $request->qty
        ]);

        if($simpan)
        {
            return Response()->json(['status' => 1]);
        }
        else
        {
            return Response()->json(['status' => 0]);
        }
    }

    public function tampilall()
    {
        $show = detil_transaksi::all();
        return Response()->json($show);
    }

    public function tampil($id)
    {
        $show = detil_transaksi::where('id', $id)->first();
        return Response()->json($show);
    }
}
