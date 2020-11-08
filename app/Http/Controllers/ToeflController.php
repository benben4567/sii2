<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Toefl;

class ToeflController extends Controller
{
    public function index()
    {
        // dd(Auth::user()->instruktur->id);
        return view('page.pengalaman.toefl.index');
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $toefl = DB::table('toefls')
                ->join('instrukturs', 'instrukturs.id', "toefls.instruktur_id")
                ->get();
            // dd($toefl);
            return DataTables::of($toefl)
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'skor' => 'required|string|max:100',
            'tipe' => 'required|string|max:100',
        ]);
        //begin transaction
        DB::beginTransaction();
        try {
            $name = NULL;
            if ($request->hasFile('file_sertifikat')) {
                $file = $request->file('file_sertifikat');
                $name = Str::random(10) . '-' . time() . '.' . $file->getClientOriginalExtension();
                $path = $request->file('file_sertifikat')->storeAs('public/file/toefl/', $name);
                // $file->move('public/file/toefl', $name);
            }
            $toefl = Toefl::create([ //MODIFIKASI BAGIAN INI DENGAN MEMASUKKANYA KE DALAM VARIABLE $USER
                'skor' => $request->skor,
                'tipe' => $request->tipe,
                'lembaga_penyelenggara' => $request->lembaga_penyelenggara,
                'masa_berlaku' => $request->masa_berlaku,
                'file_sertifikat' => $name,
                'instruktur_id' => Auth::user()->instruktur->id
            ]);
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
