<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\{Penyusun, Judul};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use File;
use Carbon\Carbon;

class PenyusunController extends Controller
{
  public function index()
  {
    // return view('page.penyusun.index'); //admin
    return view('page.pengalaman.penyusun.index'); //instruktur
  }

  public function getData(Request $request)
  {
    if ($request->ajax()) {
      $penyusun = DB::table('penyusuns')
        ->join('juduls', 'juduls.id', "=", "penyusuns.judul_id")
        ->get();

      // return dd($penyusun);
      return DataTables::of($penyusun)
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

  public function create()
  {
    // return view('page.penyusun.create'); //admin
    return view('page.pengalaman.penyusun.create'); //instruktur
  }

  public function store(Request $request)
  {
    // dd($request->all());
    DB::beginTransaction();
    try {
      $file_penyusun = NULL;
      if ($request->hasFile('file_penyusun')) {
        $file = $request->file('file_penyusun');
        $file_penyusun = Str::random(10) . '-' . time() . '.' . $file->getClientOriginalExtension();
        // $file->move('assets/file/penyusun/file_penyusun', $file_penyusun);
        $path = $request->file('file_penyusun')->storeAs('public/file/penyusun/file_penyusun', $file_penyusun);
      }
      $namafilesertifikat = NULL;
      if ($request->hasFile('file_sertifikat_pembelajaran')) {
        $file = $request->file('file_sertifikat_pembelajaran');
        $namafilesertifikat = Str::random(10) . '-' . time() . '.' . $file->getClientOriginalExtension();
        // $file->move('assets/file/penyusun/file_sertifikat_pembelajaran', $namafilesertifikat);
        $path = $request->file('file_sertifikat_pembelajaran')->storeAs('public/file/penyusun/file_sertifikat_pembelajaran', $namafilesertifikat);
      }
      $ijazah = NULL;
      if ($request->hasFile('file_pendidikan_formal')) {
        $file = $request->file('file_pendidikan_formal');
        $ijazah = Str::random(10) . '-' . time() . '.' . $file->getClientOriginalExtension();
        // $file->move('assets/file/penyusun/file_pendidikan_formal', $ijazah);
        $path = $request->file('file_pendidikan_formal')->storeAs('public/file/penyusun/file_pendidikan_formal', $ijazah);
      }
      $file_karya_tulis = NULL;
      if ($request->hasFile('file_bukti_karyatulis')) {
        $file = $request->file('file_bukti_karyatulis');
        $file_karya_tulis = Str::random(10) . '-' . time() . '.' . $file->getClientOriginalExtension();
        // $file->move('assets/file/penyusun/file_bukti_karyatulis', $file_karya_tulis);
        $path = $request->file('file_bukti_karyatulis')->storeAs('public/file/penyusun/file_bukti_karyatulis', $file_karya_tulis);
      }
      Penyusun::create([ //MODIFIKASI BAGIAN INI DENGAN MEMASUKKANYA KE DALAM VARIABLE $USER
        'file_penyusun' => $file_penyusun,
        'pendidikan_formal' => $request->pendidikan_formal,
        'file_pendidikan_formal' => $ijazah,
        'judul_id' => $request->judul_id,
        'tanggal_mulai' => $request->tanggal_mulai,
        'tanggal_selesai' => $request->tanggal_selesai,
        'file_sertifikat_pembelajaran' => $namafilesertifikat,
        'file_bukti_karyatulis' => $file_karya_tulis,
        'instruktur_id' => Auth::user()->instruktur->id
      ]);
      DB::commit();
      return redirect()->route('instruktur.penyusun.index');
    } catch (\Exception $e) {
      DB::rollback();
      return redirect()->back();
    }
  }

  public function edit()
  {
    // return view('page.penyusun.edit'); //admin
    return view('page.pengalaman.penyusun.edit'); //instruktur
  }
}
