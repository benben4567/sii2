<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\{Materi, PendalamanMateri};
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
      $pendalamanmateri = DB::table('pendalamanmateris')
        ->join('materis', 'materis.id', "=", "pendalamanmateris.materi_id")
        ->get();

      // return dd($pendalamanmateri);
      return DataTables::of($pendalamanmateri)
        ->addIndexColumn()
        ->make(true);
    }
  }

  public function select2(Request $request)
  {
    $data = Materi::selectRaw('id,materi')
      ->where('materi', 'LIKE', "%$request->q%")
      ->orderBy('materi', 'asc')
      ->paginate(10);
    return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
  }

  public function store(Request $request)
  {
    //KARENA BELUM ADA VALIDASI SEBELUMNYA, KITA TAMBAHKAN VALIDASINYA
    $this->validate($request, [
      'materi_id' => 'required|string|max:100',
    ]);
    DB::beginTransaction();
    try {
      $akhir = Carbon::createFromFormat('Y-m-d', "{$request->tgl_selesai}");
      $mulai = Carbon::createFromFormat('Y-m-d', "{$request->tgl_mulai}");
      if ($akhir->lt($mulai)) {
        return response()->json(['status' => 'errorTime'], 200);
      } else {
        PendalamanMateri::create([ //MODIFIKASI BAGIAN INI DENGAN MEMASUKKANYA KE DALAM VARIABLE $USER
          'materi_id' => $request->materi_id,
          'penyelenggara' => $request->penyelenggara,
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
