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
        ->join('udiklats', 'udiklats.id', "=", "instrukturs.udiklat_id")
        ->join('grades', 'grades.id', '=', 'pesertas.grade_id')
        ->join('level1units', 'level1units.id', '=', 'pesertas.level1unit_id')
        ->join('pendidikans', 'pendidikans.id', '=', 'pesertas.pendidikan_id')
        ->join('levelinstrukturs', 'levelinstrukturs.id', '=', 'instrukturs.levelinstruktur_id')
        ->select('pesertas.nama as nama_instruktur', 'nip', 'tipe_instruktur', 'pesertas.jabatan as jabatan_peserta', 'email', 'udiklat', 'grade', 'jeniskelamin', 'tempat_lahir', 'no_hp', 'unit_level1', 'pendidikan', 'instrukturs.*', 'level_instruktur')
        ->get();
      return DataTables::of($instruktur)
        ->addIndexColumn()
        ->make(true);
    }
  }

  public function show(Request $request, $nip, $type=null)
  {
    $instruktur = DB::table('instrukturs')
        ->join('pesertas', 'pesertas.id', "=", "instrukturs.peserta_id")
        ->join('tipeinstrukturs', 'tipeinstrukturs.id', "=", "instrukturs.tipeinstruktur_id")
        ->join('udiklats', 'udiklats.id', "=", "instrukturs.udiklat_id")
        ->join('grades', 'grades.id', '=', 'pesertas.grade_id')
        ->join('level1units', 'level1units.id', '=', 'pesertas.level1unit_id')
        ->join('pendidikans', 'pendidikans.id', '=', 'pesertas.pendidikan_id')
        ->join('levelinstrukturs', 'levelinstrukturs.id', '=', 'instrukturs.levelinstruktur_id')
        ->select('pesertas.nama as nama_instruktur', 'nip', 'tipe_instruktur', 'pesertas.jabatan as jabatan_peserta', 'email', 'udiklat', 'grade', 'jeniskelamin', 'tempat_lahir', 'no_hp', 'unit_level1', 'pendidikan', 'instrukturs.*', 'level_instruktur')
        ->where('pesertas.nip',"=", $nip)
        ->first();

    if ($request->ajax()) {
      switch ($type) {
        case 'magang':
          $instruktur = DB::table('instrukturs')
            ->join('pesertas', 'pesertas.id', "=", "instrukturs.peserta_id")
            ->join('magangs', 'magangs.instruktur_id', "=", "instrukturs.id")
            ->where('pesertas.nip',"=", $nip)
            ->get();

          return DataTables::of($instruktur)
            ->addIndexColumn()
            ->make(true);
          break;
        case 'mengajar':
          $instruktur = DB::table('instrukturs')
            ->join('pesertas', 'pesertas.id', "=", "instrukturs.peserta_id")
            ->join('mengajars', 'mengajars.instruktur_id', "=", "instrukturs.id")
            ->where('pesertas.nip',"=", $nip)
            ->get();
          return DataTables::of($instruktur)
            ->addIndexColumn()
            ->make(true);
          break;
        case 'materi':
          $instruktur = DB::table('instrukturs')
            ->join('pesertas', 'pesertas.id', "=", "instrukturs.peserta_id")
            ->join('pendalamanmateris', 'pendalamanmateris.instruktur_id', "=", "instrukturs.id")
            ->join('materis', 'materis.id', "=", "pendalamanmateris.materi_id")
            ->where('pesertas.nip',"=", $nip)
            ->get();
          return DataTables::of($instruktur)
            ->addIndexColumn()
            ->make(true);
          break;
        case 'narasumber':
          $instruktur = DB::table('instrukturs')
            ->join('pesertas', 'pesertas.id', "=", "instrukturs.peserta_id")
            ->join('narasumbers', 'narasumbers.instruktur_id', "=", "instrukturs.id")
            ->join('juduls', 'juduls.id', "=", "narasumbers.judul_id")
            ->where('pesertas.nip',"=", $nip)
            ->get();
          return DataTables::of($instruktur)
            ->addIndexColumn()
            ->make(true);
          break;
        case 'penyusun':
          $instruktur = DB::table('instrukturs')
            ->join('pesertas', 'pesertas.id', "=", "instrukturs.peserta_id")
            ->join('penyusuns', 'penyusuns.instruktur_id', "=", "instrukturs.id")
            ->join('juduls', 'juduls.id', "=", "penyusuns.judul_id")
            ->where('pesertas.nip',"=", $nip)
            ->get();
          return DataTables::of($instruktur)
            ->addIndexColumn()
            ->make(true);
          break;
        default:
          break;
      }
    }


        // dd($instruktur);
    return view('page.instruktur.show',compact("instruktur"));
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
