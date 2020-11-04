<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\{Narasumber, Judul};
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
      $narasumber = DB::table('narasumbers')
        ->join('juduls', 'juduls.id', "=", "narasumbers.judul_id")
        ->get();

      // return dd($narasumber);
      return DataTables::of($narasumber)
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

  // show form create
  public function create()
  {
    return view('page.pengalaman.narasumber.create');
  }

  public function store(Request $request)
  {

    DB::beginTransaction();
    try {
      if ($request->hasFile('file_pendidikan_formal')) {
        $file = $request->file('file_pendidikan_formal');
        $namafilependidikan = Str::random(10) . '-' . time() . '.' . $file->getClientOriginalExtension();
        $file->move('assets/file/narasumber/file_pendidikan_formal', $namafilependidikan);
      }
      if ($request->hasFile('file_sertifikat_pembelajaran')) {
        $file = $request->file('file_sertifikat_pembelajaran');
        $namafilesertifikat = Str::random(10) . '-' . time() . '.' . $file->getClientOriginalExtension();
        $file->move('assets/file/narasumber/file_sertifikat_pembelajaran', $namafilesertifikat);
      }
      $narasumber = Narasumber::create([ //MODIFIKASI BAGIAN INI DENGAN MEMASUKKANYA KE DALAM VARIABLE $USER
        'pengalaman_bidang' => $request->pengalaman_bidang,
        'pendidikan_formal' => $request->pendidikan_formal,
        'file_pendidikan_formal' => $namafilependidikan,
        'judul_id' => $request->judul_id,
        'file_sertifikat_pembelajaran' => $namafilesertifikat,
        'instruktur_id' => Auth::user()->instruktur->id
      ]);
      DB::commit();
      if ($narasumber) {
        alert()->success('Data berhasil Ditambah!');
        return redirect()->back();
      } else {
        alert()->error('Coba lagi...', 'Data gagal ditambah!');
        return redirect()->back();
      }
    } catch (\Exception $e) {
      DB::rollback();
      return response()->json_encode(['status' => 'error', 'data' => $e->getMessage()], 200);
      // return response()->json(['status' => 'success'], 200);
      return redirect()->route('instruktur.narasumber.index');
    } catch (\Exception $e) {
      DB::rollback();
      return redirect()->back();
      // return response()->json(['status' => 'error', 'data' => $e->getMessage()], 200);
    }
  }

  // shoe form edit
  public function edit()
  {
    return view('page.pengalaman.narasumber.edit');
  }
}
