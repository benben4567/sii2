<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Auth;

class JudulController extends Controller
{
  public function index()
  {
    $role = Auth::user()->roles->pluck('name');
    if ($role[0] == 'superadmin') {
      return view('page.judul.index_admin');
    } else {
      return view('page.judul.index_instruktur');
    }
  }

  public function getData(Request $request)
  {
    if ($request->ajax()) {
      $judul = DB::table('juduls')
        ->join('jenisdiklats', 'jenisdiklats.id', "=", "juduls.jenisdiklat_id")
        ->join('sifatdiklats', 'sifatdiklats.id', "=", "juduls.sifatdiklat_id")
        ->join('dahanprofesis', 'dahanprofesis.id', "=", 'juduls.dahanprofesi_id')
        ->join('levelprofisiensis', 'levelprofisiensis.id', '=', 'juduls.levelprofisiensi_id')
        ->join('penyelenggaraans', 'penyelenggaraans.id', '=', 'juduls.penyelenggaraan_id')
        ->join('jenissertifikats', 'jenissertifikats.id', '=', 'juduls.jenissertifikat_id')
        ->join('penanggungjawabs', 'penanggungjawabs.id', "=", "juduls.penanggungjawab_id")
        ->select('juduls.*', 'jenis_diklat', 'sifat_diklat', 'dahan_profesi', 'level_profisiensi', 'penyelenggaraan', 'penanggung_jawab', 'jenis_Sertifikat')
        ->get();

      // return dd($judul);
      return DataTables::of($judul)
        ->addIndexColumn()
        ->make(true);
    }
  }

  public function create()
  {
    return view('page.judul.create');
  }

  public function edit()
  {
    return view('page.judul.edit');
  }
}
