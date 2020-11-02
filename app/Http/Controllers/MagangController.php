<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Magang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use File;
use Carbon\Carbon;

class MagangController extends Controller
{
  public function index()
  {
    return view('page.pengalaman.magang.index');
  }

  public function show()
  {
  }

  public function getData(Request $request)
  {
    if ($request->ajax()) {
      $magang = DB::table('magangs')->get();

      // return dd($magang);
      return DataTables::of($magang)
        ->addIndexColumn()
        ->make(true);
    }
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'tempat_magang' => 'required|string|max:100',
      'tema_magang' => 'required|string|max:100',
    ]);
    //begin transaction
    DB::beginTransaction();
    try {
      $name = NULL;
      if ($request->hasFile('nama_file')) {
        $file = $request->file('nama_file');
        $name = Str::random(10) . '-' . time() . '.' . $file->getClientOriginalExtension();
        $file->move('assets/file/file_magang', $name);
      }
      $akhir = Carbon::createFromFormat('Y-m-d', "{$request->tgl_selesai}");
      $mulai = Carbon::createFromFormat('Y-m-d', "{$request->tgl_mulai}");
      if ($akhir->lt($mulai)) {
        return response()->json(['status' => 'errorTime'], 200);
      } else {
        Magang::create([ //MODIFIKASI BAGIAN INI DENGAN MEMASUKKANYA KE DALAM VARIABLE $USER
          'tempat_magang' => $request->tempat_magang,
          'tema_magang' => $request->tema_magang,
          'tgl_mulai' => $request->tgl_mulai,
          'tgl_selesai' => $request->tgl_selesai,
          'nama_file' => $name,
          'instruktur_id' => Auth::user()->id
        ]);
        // return dd($magang);
        // //semua proses benar
        DB::commit();
        return response()->json(['status' => 'success'], 200);
      }
    } catch (\Exception $e) {
      //ada yang error
      DB::rollback();
      return response()->json(['status' => 'error', 'data' => $e->getMessage()], 200);
    }
  }

  public function update()
  {
    //  
  }
}
