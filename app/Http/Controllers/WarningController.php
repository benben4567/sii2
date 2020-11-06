<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\{Aspek, Judul, Warning};

class WarningController extends Controller
{
  public function index()
  {
    return view('page.early_warning.index');
  }

  public function detail($id)
  {
    $detailWarning = Warning::where('judul_id', $id)->with('instruktur', 'peserta', 'judul')->get();
    // dd($detailWarning);
    return response()->json($detailWarning);
  }

  public function show($id)
  {
    $judul = Warning::with('judul')->where('judul_id', $id)->get();
    // dd($judul);
    return view('page.early_warning.kategoriReview', compact('judul'));
  }

  public function showDetail(Request $request, $id, $type = null)
  {
    $judul = DB::table('juduls')
      ->join('kurikulums', 'kurikulums.judul_id', "=", "juduls.id")
      // ->join('juduls', 'juduls.id', "=", "silabus.judul_id")
      // ->join('juduls', 'juduls.id', "=", "handouts.judul_id")
      // ->join('juduls', 'juduls.id', "=", "materitayangs.judul_id")
      // ->join('juduls', 'juduls.id', "=", "petunjukinstrukturs.judul_id")
      // ->join('juduls', 'juduls.id', "=", "petunjukpenyelenggaras.judul_id")
      // ->join('juduls', 'juduls.id', "=", "toolsevaluasis.judul_id")
      // ->join('juduls', 'juduls.id', "=", "petunjukpraktiks.judul_id")
      ->select('judul_id', 'nama_judul', 'kurikulums.*')
      ->where('kurikulums.judul_id', "=", $id)
      ->first();

    if ($request->ajax()) {
      switch ($type) {
        case 'kurikulum':
          $judul = DB::table('juduls')
            ->join('kurikulums', 'kurikulums.judul_id', "=", "juduls.id")
            ->join('instrukturs', 'instrukturs.id', "=", "kurikulums.instruktur_id")
            ->where('kurikulums.judul_id', "=", $id)
            ->get();
          return DataTables::of($judul)
            ->addIndexColumn()
            ->make(true);
          break;
        case 'silabus':
          $judul = DB::table('juduls')
            ->join('silabus', 'silabus.judul_id', "=", "juduls.id")
            ->join('instrukturs', 'instrukturs.id', "=", "silabus.instruktur_id")
            ->where('silabus.judul_id', "=", $id)
            ->get();
          return DataTables::of($judul)
            ->addIndexColumn()
            ->make(true);
          break;
        case 'handout':
          $judul = DB::table('juduls')
            ->join('handouts', 'handouts.judul_id', "=", "juduls.id")
            ->join('instrukturs', 'instrukturs.id', "=", "handouts.instruktur_id")
            ->where('handouts.judul_id', "=", $id)
            ->get();
          return DataTables::of($judul)
            ->addIndexColumn()
            ->make(true);
          break;
        case 'materitayang':
          $judul = DB::table('juduls')
            ->join('materitayangs', 'materitayangs.judul_id', "=", "juduls.id")
            ->join('instrukturs', 'instrukturs.id', "=", "materitayangs.instruktur_id")
            ->where('materitayangs.judul_id', "=", $id)
            ->get();
          return DataTables::of($judul)
            ->addIndexColumn()
            ->make(true);
          break;
        case 'petunjukinstruktur':
          $judul = DB::table('juduls')
            ->join('petunjukinstrukturs', 'petunjukinstrukturs.judul_id', "=", "juduls.id")
            ->join('instrukturs', 'instrukturs.id', "=", "petunjukinstrukturs.instruktur_id")
            ->where('petunjukinstrukturs.judul_id', "=", $id)
            ->get();
          return DataTables::of($judul)
            ->addIndexColumn()
            ->make(true);
          break;
        case 'petunjukpenyelenggara':
          $judul = DB::table('juduls')
            ->join('petunjukpenyelenggaras', 'petunjukpenyelenggaras.judul_id', "=", "juduls.id")
            ->join('instrukturs', 'instrukturs.id', "=", "petunjukpenyelenggaras.instruktur_id")
            ->where('petunjukpenyelenggaras.judul_id', "=", $id)
            ->get();
          return DataTables::of($judul)
            ->addIndexColumn()
            ->make(true);
          break;
        case 'toolsevaluasi':
          $judul = DB::table('juduls')
            ->join('toolsevaluasis', 'toolsevaluasis.judul_id', "=", "juduls.id")
            ->join('instrukturs', 'instrukturs.id', "=", "toolsevaluasis.instruktur_id")
            ->where('toolsevaluasis.judul_id', "=", $id)
            ->get();
          return DataTables::of($judul)
            ->addIndexColumn()
            ->make(true);
          break;
        case 'petunjukpraktik':
          $judul = DB::table('juduls')
            ->join('petunjukpraktiks', 'petunjukpraktiks.judul_id', "=", "juduls.id")
            ->join('instrukturs', 'instrukturs.id', "=", "petunjukpraktiks.instruktur_id")
            ->where('petunjukpraktiks.judul_id', "=", $id)
            ->get();
          return DataTables::of($judul)
            ->addIndexColumn()
            ->make(true);
          break;
      }
    }
    // dd($judul);
    return view('page.early_warning.show', compact('judul'));
  }

  public function getData(Request $request)
  {
    $warnings = Warning::with('judul')->get();
    if ($request->ajax()) {
      $judul = DB::table('warnings')
        ->join('juduls', 'juduls.id', "=", "warnings.judul_id")
        ->join('instrukturs', 'instrukturs.id', "=", "warnings.instruktur_id")
        ->join('pesertas', 'pesertas.id', "=", "instrukturs.peserta_id")
        ->get();

      // dd($judul);
      return DataTables::of($judul, $warnings)
        ->addIndexColumn()
        ->make(true);
    }
  }


  // menyimpan data dari halaman tambah
  public function store(Request $request)
  {
    $messages = [
      'required' => ' :Attribute wajib diisi!',
      'min' => 'Informasi pendukung minimal diisi 50 karakter'
    ];

    $validasi = $request->validate([
      'informasi_pendukung' => 'required|min:10',
      'aspek' => 'required'
    ], $messages);

    $inputvalue = $request->all();
    $arraytostring = implode(',', $request->input('aspek'));
    $inputvalue['aspek'] = $arraytostring;
    // $input = auth()->user()->warnings()->create($inputvalue);
    $instruktur = Auth::user()->instruktur;
    $input = $instruktur->warnings()->create($inputvalue);
    if ($input) {
      alert()->success('Data berhasil Ditambah!', 'Terimakasih sudah memberi warning.');
      return redirect()->back();
    } else {
      alert()->error('Coba lagi...', 'Data gagal ditambah!');
      return redirect()->back();
    }
  }

  // menampilkan halaman edit
  public function edit()
  {
    return view();
  }

  // menyimpan data dari halaman edit
  public function update()
  {
  }
}
