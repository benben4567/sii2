<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class InstrukturController extends Controller
{
    public function index()
    {
      return view('page.instruktur.index');
    }

    public function getData(Request $request)
    {
      if ($request->ajax()) {
        $instruktur = DB::table('instrukturs')
                    ->join('pesertas', 'pesertas.id', "=", "instrukturs.peserta_id")
                    ->join('tipeinstrukturs', 'tipeinstrukturs.id', "=", "instrukturs.tipeinstruktur_id")
                    ->select('nama', 'nip', 'tipe_instruktur', 'jabatan', 'email')
                    ->get();
        return DataTables::of($instruktur)
                    ->addIndexColumn()
                    ->make(true);
      }
    }

    public function show()
    {
      return view('page.instruktur.show');
    }

    public function create()
    {
      return view('page.instruktur.create');
    }

    public function edit()
    {
      return view('page.instruktur.edit');
    }
}
