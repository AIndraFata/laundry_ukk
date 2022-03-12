<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class OutletController extends Controller
{
    public function show_add()
    {
        return view('outlet.add_outlet');
    }

    public function show_edit($id)
    {
        $outlet = DB::table('outlet')->where('id', $id)->first();
        return view('outlet/edit_outlet', compact('outlet'));
    }

    public function tambah(Request $request)
    {
        $validator=Validator::make($request->all(),
            [
                'nama_outlet'       => 'required',
                'alamat'            => 'required',
                'no_telp_outlet'    => 'required'
            ]  
        );

        if($validator->fails())
        {
            return Response()->json($validator->errors());
        }

        $simpan = Outlet::create([
            'nama_outlet'   => $request->nama_outlet,
            'alamat'        => $request->alamat,
            'no_telp_outlet'=> $request->no_telp_outlet
        ]);

        if($simpan)
        {
            // return Response()->json(['status' => 'Outlet Berhasil Ditambahkan']);
        }
        else 
        {
            return Response()->json(['status' => 'Outlet Tidak Berhasil Ditambahkan']);
        }

        return redirect('outlet')->with('status','Outlet Berhasil Ditambah!');
    }

    public function tampilall()
    {
        $show = Outlet::all();
        // return Response()->json($show);
        return view('outlet.home_outlet', ['outlet' =>$show]);
    }

    public function tampil($id)
    {
        $show = Outlet::where('id', $id)->first();
        return Response()->json($show);
    }

    public function update($id, Request $request)
    {
        $validator=Validator::make($request->all(),
        [
            'nama_outlet'       => 'required',
            'alamat'            => 'required',
            'no_telp_outlet'    => 'required'
        ]);

        if($validator->fails())
        {
            return Response()->json($validator->errors());
        }

        $ganti = Outlet::where('id', $id)->update([
            'nama_outlet'       => $request->nama_outlet,
            'alamat'            => $request->alamat,
            'no_telp_outlet'    => $request->no_telp_outlet
        ]);
        
        if($ganti)
        {
            // return Response()->json(['status' =Outlet Berhasil Diupdate']);
        }
        else
        {
            return Response()->json(['status' => 'Data Outlet Tidak Berhasil Diupdate']);
        }
        return redirect('outlet')->with('status', 'Outlet Berhasil Di Update!');
    }

    public function destroy($id)
    {
       $hapus = Outlet::where ('id', $id)->delete();
    //    if($hapus)
    //    {
    //        return Response()->json(['status' => 'Data Outlet Berhasil Dihapus']);
    //    }
    //    else
    //    {
    //        return Response()->json(['status' => 'Data Outlet Tidak Berhasil Dihapus']);
    //    }

    return redirect('/outlet');
    }
}
