<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\{Judul, JurnalIlmiah};

class JurnalIlmiahController extends Controller
{
    public function index()
    {
        return view('page.pengalaman.jurnalilmiah.index');
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $jurnalilmiah = DB::table('jurnalilmiahs')
                ->join('instrukturs', 'instrukturs.id', "=", "jurnalilmiahs.instruktur_id")
                ->join('juduls', 'juduls.id', "=", "jurnalilmiahs.judul_id")
                ->get();
            return DataTables::of($jurnalilmiah)
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
            'tingkatan' => 'required|string|max:100',
            'lembaga_penyelenggara' => 'required|string|max:100',
        ]);
        //begin transaction
        DB::beginTransaction();
        try {
            $jurnalilmiah = NULL;
            if ($request->hasFile('file_jurnal_ilmiah')) {
                $file = $request->file('file_jurnal_ilmiah');
                $jurnalilmiah = Str::random(10) . '-' . time() . '.' . $file->getClientOriginalExtension();
                $path = $request->file('file_jurnal_ilmiah')->storeAs('public/file/jurnalilmiah/', $jurnalilmiah);
                // $file->move('public/file/toefl', $jurnalilmiah);
            }

            $abstrak = NULL;
            if ($request->hasFile('file_abstrak')) {
                $file = $request->file('file_abstrak');
                $abstrak = Str::random(10) . '-' . time() . '.' . $file->getClientOriginalExtension();
                $path = $request->file('file_abstrak')->storeAs('public/file/jurnalilmiah/abstrak/', $abstrak);
                // $file->move('public/file/toefl', $jurnalilmiah);
            }
            $toefl = JurnalIlmiah::create([ //MODIFIKASI BAGIAN INI DENGAN MEMASUKKANYA KE DALAM VARIABLE $USER
                'judul_id' => $request->judul,
                'tingkatan' => $request->tingkatan,
                'lembaga_penyelenggara' => $request->lembaga_penyelenggara,
                'tanggal_submit' => $request->tanggal_submit,
                'tanggal_presentasi' => $request->tanggal_presentasi,
                'file_jurnal_ilmiah' => $jurnalilmiah,
                'file_abstrak' => $abstrak,
                'instruktur_id' => Auth::user()->instruktur->id
            ]);
            // dd($toefl);
            // //semua proses benar
            DB::commit();
            return response()->json(['status' => 'success'], 200);
        } catch (\Exception $e) {
            //ada yang error
            DB::rollback();
            return redirect()->back();
        }
    }
}
