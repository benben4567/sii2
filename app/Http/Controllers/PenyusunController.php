<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Penyusun;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use File;
use Carbon\Carbon;

class PenyusunController extends Controller
{
  public function index()
  {
    // return view('page.penyusun.index'); //admin
    return view('page.pengalaman.penyusun.index'); //instruktur
  }

  public function getData(Request $request)
  {
    if ($request->ajax()) {
      $penyusun = DB::table('penyusuns')->get();

      // return dd($penyusun);
      return DataTables::of($penyusun)
        ->addIndexColumn()
        ->make(true);
    }
  }

  public function create()
  {
    // return view('page.penyusun.create'); //admin
    return view('page.pengalaman.penyusun.create'); //instruktur
  }

  public function edit()
  {
    // return view('page.penyusun.edit'); //admin
    return view('page.pengalaman.penyusun.edit'); //instruktur
  }
}
