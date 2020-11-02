<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Materi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use File;
use Carbon\Carbon;

class MateriController extends Controller
{
  public function index()
  {
    return view('page.materi.index');
  }

  public function getData(Request $request)
  {
    $materi = DB::table('materis')->join('jenismateris', 'jenismateris.id', '=', 'materis.jenismateri_id')->get();
    if ($request->ajax()) {
      return DataTables::of($materi)
        ->addIndexColumn()
        ->make(true);
    }
  }


  public function create()
  {
    return view('page.materi.tambahmateri');
  }

  public function edit()
  {
    $materi = '';
    return view('page.materi.edit', compact('materi'));
  }
}
