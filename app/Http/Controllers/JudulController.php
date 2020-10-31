<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class JudulController extends Controller
{
  public function index()
  {
    // if ($role == 'admin') {
    //   return view('page.judul.index_admin');
    // } else {
    //   return view('page.judul.index_instruktur');
    // }
    return view('page.judul.index_admin');
  }

  public function getData(Request $request)
  {
    if ($request->ajax()) {
      $judul = DB::table('juduls')
        ->join('jenisdiklats', 'jenisdiklats.id', "=", "juduls.jenisdiklat_id")
        ->join('sifatdiklats', 'sifatdiklats.id', "=", "juduls.sifatdiklat_id")
        ->select('nama_judul', 'jenis_diklat', 'sifat_diklat', 'durasi_hari')
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
