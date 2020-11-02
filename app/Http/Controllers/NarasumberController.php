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
