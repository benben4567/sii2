<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\{Aspek, Warning};

class WarningController extends Controller
{
  public function index()
  {
    return view('page.early_warning.index');
  }

  public function detail($id)
  {
    $detailWarning = Warning::where('judul_id', $id)->with('user', 'judul')->get();
    // dd($detailWarning);
    return response()->json($detailWarning);
  }

  public function show()
  {
    return view('page.early_warning.kategoriReview');
  }

  // public function show(Request $request, $warning, $type = null)
  // {
  //   $warning = DB::table('warnings')
  //     ->join('instrukturs', 'instrukturs.id', 'warnings.instruktur_id')
  //     ->join('juduls', 'juduls.id', "=", "warnings.judul_id")
  //     ->join('warnings', 'warnings.id', "=", "kurikulums.warning_id")
  //     ->join('warnings', 'warnings.id', "=", "silabus.warning_id")
  //     ->join('warnings', 'warnings.id', "=", "handouts.warning_id")
  //     ->join('warnings', 'warnings.id', "=", "materitayangs.warning_id")
  //     ->join('warnings', 'warnings.id', "=", "petunjukinstrukturs.warning_id")
  //     ->join('warnings', 'warnings.id', "=", "petunjukpenyelenggaras.warning_id")
  //     ->join('warnings', 'warnings.id', "=", "toolsevaluasis.warning_id")
  //     ->join('warnings', 'warnings.id', "=", "petunjukpraktiks.warning_id")
  //     ->select('')
  //     ->where('warnings.id', "=", $warning)
  //     ->first();

  //   if ($request->ajax()) {
  //     switch ($type) {
  //       case 'kurikulum':
  //         $kurikulum = DB::table('warnings')
  //           ->join('juduls', 'juduls.id', "=", "warnings.judul_id")
  //           ->join('instrukturs', 'instrukturs.id', "=", "warnings.instruktur_id")
  //           ->join('kurikulums', 'kurikulums.warning_id', "=", "warnings.id")
  //           ->where('warnings.id', "=", $warning)
  //           ->get();

  //         return DataTables::of($kurikulum)
  //           ->addIndexColumn()
  //           ->make(true);
  //         break;
  //     }
  //   }
  // }

  public function getData(Request $request)
  {
    $warnings = Warning::with('judul')->get();
    if ($request->ajax()) {
      $judul = DB::table('warnings')
        ->join('juduls', 'juduls.id', "=", "warnings.judul_id")
        ->join('instrukturs', 'instrukturs.id', "=", "warnings.instruktur_id")
        ->join('pesertas', 'pesertas.id', "=", "instrukturs.peserta_id")
        ->get();

      // return dd($judul);
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
