<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Narasumber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use File;
use Carbon\Carbon;

class NarasumberController extends Controller
{
  public function index()
  {
    return view('page.pengalaman.narasumber.index');
  }

  public function getData(Request $request)
  {
    if ($request->ajax()) {
      $narasumber = DB::table('narasumbers')->get();

      // return dd($narasumber);
      return DataTables::of($narasumber)
        ->addIndexColumn()
        ->make(true);
    }
  }

  public function store(Request $request)
  {
    // dd($request->all());
    DB::beginTransaction();
    try {
      $namafilependidikan = NULL;
      if ($request->hasFile('ijazah')) {
        $file = $request->file('ijazah');
        $namafilependidikan = Str::random(10) . '-' . time() . '.' . $file->getClientOriginalExtension();
        $file->move('assets/file/narasumber/file_ijazah', $namafilependidikan);
      }
      $namafilesertifikat = NULL;
      if ($request->hasFile('file_sertifikat_pembelajaran')) {
        $file = $request->file('file_sertifikat_pembelajaran');
        $namafilesertifikat = Str::random(10) . '-' . time() . '.' . $file->getClientOriginalExtension();
        $file->move('assets/file/narasumber/file_sertifikat_pembelajaran', $namafilesertifikat);
      }
      Narasumber::create([ //MODIFIKASI BAGIAN INI DENGAN MEMASUKKANYA KE DALAM VARIABLE $USER
        'pengalaman_bidang' => $request->tahun_pengalaman,
        'pendidikan_formal' => $request->pendidikan_formal,
        'file_pendidikan_formal' => $namafilependidikan,
        'judul_sertifikat_pembelajaran' => $request->judul_sertifikat_pembelajaran,
        'file_sertifikat_pembelajaran' => $namafilesertifikat,
        'instruktur_id' => Auth::user()->instruktur->id
      ]);
      DB::commit();
      return response()->json(['status' => 'success'], 200);
    } catch (\Exception $e) {
      DB::rollback();
      return response()->json(['status' => 'error', 'data' => $e->getMessage()], 200);
    }
  }

  // show form create
  public function create()
  {
    return view('page.pengalaman.narasumber.create');
  }

  // shoe form edit
  public function edit()
  {
    return view('page.pengalaman.narasumber.edit');
  }
}
