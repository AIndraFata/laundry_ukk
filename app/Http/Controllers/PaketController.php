<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use App\Models\Member;
use App\Http\Controllers\MemberController;
Use Illuminate\Support\Facades\Validator;
Use Illuminate\Support\Facades\DB;

class PaketController extends Controller
{
    public function show_add()
    {
        return view('paket.add_paket');
    }

    public function show_edit($id)
    {
        $paket = DB::table('paket')->where('id', $id)->first();
        return view('paket/edit_paket', compact('paket'));
    }

    public function tambah(Request $request)
    {
        $validator=Validator::make($request->all(),
            [
                'jenis' => 'required',
                'harga' => 'required'
            ]
        );

        if($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $simpan = Paket::create([
            'jenis' => $request->jenis,
            'harga' => $request->harga
        ]);

        if($simpan)
        {
            // return Response()->json(['status' => 1]);
        }
        else
        {
            return Response()->json(['status' => 0]);
        }

        return redirect('paket')->with('status','Paket Berhasil Ditambahkan');
    }

    public function tampilall()
    {
        $show = Paket::all();
        // return Response()->json($show);
        return view('paket.home_paket', ['paket' => $show]); 
    }
    
    public function tampil($id)
    {
        $show = Paket::where('id', $id)->first();
        return Response()->json($show);
    }

    public function update($id, Request $request)
    {
        $validator=Validator::make($request->all(),
        [
            'jenis' => 'required',
            'harga' => 'required'
        ]);

        if($validator->fails())
        {
            return Response()->json($validator->errors());
        }

        $ganti = Paket::where('id', $id)->update
        ([
            'jenis' => $request->jenis,
            'harga' => $request->harga
        ]);

        if($ganti)
        {
            // return Response()->json(['status' => 1]);
        }
        else
        {
            return Response()->json(['status' => 0]);
        }

        return redirect('paket')->with('status', 'Data Paket Berhasil di Update');
    }

    public function destroy($id)
    {
        $hapus = Paket::where('id', $id)->delete();
        // if($hapus) 
        // {
        //     return Response()->json(['status' => 1]);
        // }
        // else
        // {
        //     return Response()->json(['status' => 0]);
        // }

        return redirect('/paket');
    }
}
