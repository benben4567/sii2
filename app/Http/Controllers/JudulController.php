<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\{Aspek, Judul, Warning};

class JudulController extends Controller
{
  public function index()
  {
    $aspeks = Aspek::get();
    $role = Auth::user()->roles->pluck('name');

    $warnings = Warning::with('judul')->get();
    if ($role[0] == 'super-admin') {
      return view('page.judul.index_admin', compact('warnings'));
    } else {
      return view('page.judul.index_instruktur', compact('aspeks', 'warnings'));
    }
  }

  public function getData(Request $request)
  {
    if ($request->ajax()) {
      $judul = Judul::select('id', 'kode_judul_lama', 'kode_judul', 'durasi_hari', 'tahun_terbit', 'nama_judul', 'sifatdiklat_id', 'jenisdiklat_id', 'dahanprofesi_id', 'levelprofisiensi_id')
        ->with(['warnings:id,judul_id', 'sifatdiklat:id,sifat_diklat', 'jenisdiklat:id,jenis_diklat', 'dahanprofesi:id,dahan_profesi', 'levelprofisiensi:id,level_profisiensi'])
        ->get();
      // $judul = \App\Judul::with(['warnings','sifatdiklat','jenisdiklat'])->get();
      // $judul = DB::table('juduls')
      //   ->join('jenisdiklats', 'jenisdiklats.id', "=", "juduls.jenisdiklat_id")
      //   ->join('sifatdiklats', 'sifatdiklats.id', "=", "juduls.sifatdiklat_id")
      //   ->join('dahanprofesis', 'dahanprofesis.id', "=", 'juduls.dahanprofesi_id')
      //   ->join('levelprofisiensis', 'levelprofisiensis.id', '=', 'juduls.levelprofisiensi_id')
      //   ->join('penyelenggaraans', 'penyelenggaraans.id', '=', 'juduls.penyelenggaraan_id')
      //   ->join('jenissertifikats', 'jenissertifikats.id', '=', 'juduls.jenissertifikat_id')
      //   ->join('penanggungjawabs', 'penanggungjawabs.id', "=", "juduls.penanggungjawab_id")
      //   ->rightJoin('warnings', 'warnings.judul_id', "=", "juduls.id")
      //   ->select('juduls.*', 'jenis_diklat', 'sifat_diklat', 'dahan_profesi', 'level_profisiensi', 'penyelenggaraan', 'penanggung_jawab', 'jenis_Sertifikat')
      //   ->get();

      // return dd($judul);
      return DataTables::of($judul)
        ->addIndexColumn()
        // ->toJson();
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
