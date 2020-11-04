<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\{Bidang};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BidangController extends Controller
{
  public function index()
  {
    return view('page.sertifikasi.bidang.index');
  }

  public function getData(Request $request)
  {
    if ($request->ajax()) {
      $bidang = DB::table('bidangs')->get();
      // return dd($bidang);
      return DataTables::of($bidang)
        ->addIndexColumn()
        ->make(true);
    }
  }

  public function show()
  {
  }

  public function store(Request $request)
  {
    //KARENA BELUM ADA VALIDASI SEBELUMNYA, KITA TAMBAHKAN VALIDASINYA
    $this->validate($request, [
      'nama_sertifikasi' => 'required|string|max:100',
      'tgl_pelaksanaan'         => 'required|date'
    ]);

    DB::beginTransaction();
    try {
      $name = NULL;
      if ($request->hasFile('nama_file')) {
        $file = $request->file('nama_file');
        $name = Str::random(10) . '-' . time() . '.' . $file->getClientOriginalExtension();
        $file->move('assets/file/file_sertifikasi_bidang', $name);
      }
      $jml = Bidang::where('nama_sertifikasi', '=', $request['nama_sertifikasi'])
        ->where('instruktur_id', Auth::user()->instruktur->id)->count();
      if ($jml < 1) {
        Bidang::create([ //MODIFIKASI BAGIAN INI DENGAN MEMASUKKANYA KE DALAM VARIABLE $USER
          'nama_sertifikasi' => $request->nama_sertifikasi,
          'tgl_pelaksanaan' => $request->tgl_pelaksanaan,
          'batas_sertifikasi' => $request->batas_sertifikasi,
          'nama_file' => $name,
          'instruktur_id' => Auth::user()->instruktur->id
        ]);
        DB::commit();
        return response()->json(['status' => 'success'], 200);
      } else {
        return response()->json(['status' => 'error'], 200);
      }
    } catch (\Exception $e) {
      DB::rollback();
      return response()->json(['status' => 'error', 'data' => $e->getMessage()], 200);
    }
  }

  public function update()
  {
  }
}
