<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class JurnalIlmiahController extends Controller
{
    public function index()
    {
        return view('page.pengalaman.jurnalilmiah.index');
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $jurnalilmiah = DB::table('jurnalilmiahs')->get();
            // dd($jurnalilmiah);
            return DataTables::of($jurnalilmiah)
                ->addIndexColumn()
                ->make(true);
        }
    }
}
