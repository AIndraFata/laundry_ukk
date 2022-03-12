<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function show_add()
    {
        return view('member.add_member');   
    }

    public function show_edit($id)
    {
        $member = DB::table('member')->where('id', $id)->first();
        return view('member/edit_member', compact('member'));
    }

    public function tambah(Request $request)
    {
        $validator=Validator::make($request->all(),
            [
                'nama'          => 'required',
                'alamat'        => 'required',
                'jenis_kelamin' => 'required',
                'no_telp'       => 'required'
            ]);

        if($validator->fails()) 
        {
            return Response()->json($validator->errors());
        }

        $simpan = Member::create([
            'nama'          => $request->nama,
            'alamat'        => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp'       => $request->no_telp
        ]);

        if($simpan) 
        {
            // return Response()->json(['status' => 'Member berhasil ditambahkan']);
        }
        else 
        {
            return Response()->json(['status' => 'Member tidak berhasil ditambahkan']);
        }

        return redirect('member')->with('status','Member Berhasil Ditambah');

    }

    public function tampilall() 
    {
        $show = Member::all();
        // return Response()->json($show);
        // return $show;
        return view('member.home_member', ['member' => $show]);            
    }

    public function tampil($id)
    {
        $show = Member::where('id', $id)->first();
        return Response()->json($show);
    }

    public function update($id, Request $request)
    {
        $validator=Validator::make($request->all(),
        [
            'nama'          => 'required',
            'alamat'        => 'required',
            'jenis_kelamin' => 'required',
            'no_telp'       => 'required'
        ]);

        if($validator->fails())
        {
            return Response()->json($validator->errors());
        }

        $ganti = Member::where('id', $id)->update([
            'nama'          => $request->nama,
            'alamat'        => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp'       => $request->no_telp
        ]);

        if($ganti)
        {
            // return Response()->json(['status' => 'Data member berhasil diupdate']);
        }
        else
        {
            return Response()->json(['status' => 'Data member tidak berhasil diupdate']);
        }
        return redirect('member')->with('status', 'Member Berhasil Di Update!');
    }

    public function destroy($id)
    {
        $hapus = Member::where('id', $id)->delete();
        // if($hapus)
        // {
        //     return Response()->json(['status' => 'Data member berhasil dihapus']);
        // }
        // else
        // {
        //     return Response()->json(['status' => 'Data member gagal dihapus']);
        // }

        return redirect('/member');
    }
}
