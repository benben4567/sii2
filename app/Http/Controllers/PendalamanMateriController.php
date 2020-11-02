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

class PendalamanMateriController extends Controller
{
  public function index()
  {
    return view('page.pengalaman.pendalaman_materi.index');
  }

  public function getData(Request $request)
  {
    if ($request->ajax()) {
      $pendalamanmateri = DB::table('pendalamanmateris')->get();

      // return dd($pendalamanmateri);
      return DataTables::of($pendalamanmateri)
        ->addIndexColumn()
        ->make(true);
    }
  }

  public function show()
  {
  }

  public function store()
  {
  }

  public function update()
  {
  }
}
