<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class EvaluasiController extends Controller
{
    public function indexTerbuka()
    {
        return view('page.evaluasi.terbuka.index');
    }

    public function indexTertutup()
    {
        // return view('page.penyusun.index'); //admin
        return view('page.evaluasi.tertutup.index');
    }

    public function getDataTerbuka(Request $request)
    {
        $terbuka = DB::table('jawabanterbukaevaluasis')
            ->join('detailpenjadwalanpesertas', 'detailpenjadwalanpesertas.id', '=', 'jawabanterbukaevaluasis.detailpenjadwalanpeserta_id')
            ->join('pernyataanevaluasis', 'pernyataanevaluasis.id', "=", "jawabanterbukaevaluasis.pernyataanevaluasi_id")
            ->join('penjadwalans', 'penjadwalans.id', "=", "detailpenjadwalanpesertas.penjadwalan_id")
            ->join('detailwos', 'detailwos.id', "=", "detailpenjadwalanpesertas.detailwo_id")
            ->join('wos', 'wos.id', "=", "detailwos.wo_id")
            ->join('juduls', 'juduls.id', "=", "wos.judul_id")
            ->join('jenisdiklats', 'jenisdiklats.id', "=", "juduls.jenisdiklat_id")
            ->select('jawabanterbukaevaluasis.*', 'tanggal_mulai', 'tanggal_selesai', 'wos.kode_judul', 'wos.nama_judul', 'udiklat', 'penyelenggaraan', 'jenis_pelaksanaan', 'komentar', 'jenis_diklat')
            ->get();
        if ($request->ajax()) {
            return DataTables::of($terbuka)
                ->addIndexColumn()
                ->make(true);
        }
        // dd($terbuka);
    }

    public function getDataTertutup(Request $request)
    {
        $tertutup = DB::table('jawabantertutupevaluasis')
            ->join('detailpenjadwalanpesertas', 'detailpenjadwalanpesertas.id', '=', 'jawabantertutupevaluasis.detailpenjadwalanpeserta_id')
            ->join('pernyataanevaluasis', 'pernyataanevaluasis.id', "=", "jawabantertutupevaluasis.pernyataanevaluasi_id")
            ->join('penjadwalans', 'penjadwalans.id', "=", "detailpenjadwalanpesertas.penjadwalan_id")
            // ->join('detailwos', 'detailwos.id', "=", "detailpenjadwalanpesertas.detailwo_id")
            ->join('wos', 'wos.id', "=", "penjadwalans.wo_id")
            // ->join('juduls', 'juduls.id', "=", "wos.judul_id")
            // ->join('jenisdiklats', 'jenisdiklats.id', "=", "juduls.jenisdiklat_id")
            ->select('jawabantertutupevaluasis.id', 'jawabantertutupevaluasis.detailpenjadwalanpeserta_id', 'jawabantertutupevaluasis.nilai', 'wos.id')
            ->get();
        if ($request->ajax()) {
            return DataTables::of($tertutup)
                ->addIndexColumn()
                ->make(true);
        }
        // dd($tertutup);
    }
}
