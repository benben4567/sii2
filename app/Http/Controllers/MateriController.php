<?php

namespace App\Http\Controllers;

use App\DataTables\MateriDataTable;
use App\Materi;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;

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
