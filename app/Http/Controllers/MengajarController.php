<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\{Mengajar, Judul};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use File;
use Carbon\Carbon;

class MengajarController extends Controller
{
  public function index()
  {
    return view('page.pengalaman.mengajar.index');
  }

  public function getData(Request $request)
  {
    if ($request->ajax()) {
      $mengajar = DB::table('mengajars')
        ->join('juduls', 'juduls.id', "=", "mengajars.judul_id")
        ->get();

      // return dd($mengajar);
      return DataTables::of($mengajar)
        ->addIndexColumn()
        ->make(true);
    }
  }

  public function select2(Request $request)
  {
    $data = Judul::selectRaw('id,nama_judul')
      ->where('nama_judul', 'LIKE', "%$request->q%")
      ->orderBy('nama_judul', 'asc')
      ->paginate(10);
    return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'materi_pembelajaran' => 'required|string|max:100',
      'tempat_mengajar' => 'required|string|max:100',
    ]);

    DB::beginTransaction();
    try {
      // $name = NULL;
      // if ($request->hasFile('nama_file')) {
      //   $file = $request->file('nama_file');
      //   $name = uniqid() . '-' . time() . '.' . $file->getClientOriginalExtension();
      //   $file->move('assets/file/file_mengajar', $name);
      // }

      $akhir = Carbon::createFromFormat('Y-m-d', "{$request->tgl_selesai}");
      $mulai = Carbon::createFromFormat('Y-m-d', "{$request->tgl_mulai}");
      if ($akhir->lt($mulai)) {
        return response()->json(['status' => 'errorTime'], 200);
      } else {
        Mengajar::create([ //MODIFIKASI BAGIAN INI DENGAN MEMASUKKANYA KE DALAM VARIABLE $USER
          'id_judul' => $request->materi_pembelajaran,
          'tempat_mengajar' => $request->tempat_mengajar,
          'tgl_mulai' => $request->tgl_mulai,
          'tgl_selesai' => $request->tgl_selesai,
          'instruktur_id' => Auth::user()->instruktur->id
        ]);

        DB::commit();
        return response()->json(['status' => 'success'], 200);
      }
    } catch (\Exception $e) {
      DB::rollback();
      return response()->json(['status' => 'error', 'data' => $e->getMessage()], 200);
    }
  }

  public function show()
  {
  }

  public function update()
  {
  }
}
