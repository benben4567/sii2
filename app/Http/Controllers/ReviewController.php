<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\{Kurikulum, Silabus, Handout, MateriTayang, PetunjukInstruktur, PetunjukPenyelenggara, PetunjukPraktik, ToolsEvaluasi};

class ReviewController extends Controller
{

    public function index()
    {
        // dd(Auth::user()->instruktur->id);
        return view('page.early_warning.kategoriReview');
    }
    public function storeKurikulum(Request $request)
    {
        $create = Kurikulum::create([
            'judul_id' => $request->judul_id,
            'instruktur_id' => Auth::user()->instruktur->id,
            'tujuan' => $request->tujuan,
            'syarat_peserta' => $request->syarat_peserta,
            'skp' => $request->skp,
            'metode' => $request->metode,
            'lingkup' => $request->lingkup,
            'strategi' => $request->strategi,
            'level' => $request->level,
            'sertifikat' => $request->sertifikat,
            'referensi' => $request->referensi

        ]);
        // dd($create);
        if ($create) {
            alert()->success('Data berhasil Ditambah!', 'Terimakasih sudah memberi review.');
            return redirect()->back();
        } else {
            alert()->error('Coba lagi...', 'Data gagal ditambah!');
            return redirect()->back();
        }
    }

    public function storeSilabus(Request $request)
    {
        $create = Silabus::create([
            'judul_id' => $request->judul_id,
            'instruktur_id' => Auth::user()->instruktur->id,
            'bahasan' => $request->bahasan,
            'hasil_pelatihan' => $request->hasil_pelatihan,
            'kriteria_penilaian' => $request->kriteria_penilaian,
            'metode_penilaian' => $request->metode_penilaian,
            'waktu' => $request->waktu,
            'referensi' => $request->referensi

        ]);
        if ($create) {
            alert()->success('Data berhasil Ditambah!', 'Terimakasih sudah memberi review.');
            return redirect()->back();
        } else {
            alert()->error('Coba lagi...', 'Data gagal ditambah!');
            return redirect()->back();
        }
    }

    public function storeHandout(Request $request)
    {
        $create = Handout::create([
            'judul_id' => $request->judul_id,
            'instruktur_id' => Auth::user()->instruktur->id,
            'handout_sebelum' => $request->handout_sebelum,
            'handout_new' => $request->handout_new
        ]);
        if ($create) {
            alert()->success('Data berhasil Ditambah!', 'Terimakasih sudah memberi review.');
            return redirect()->back();
        } else {
            alert()->error('Coba lagi...', 'Data gagal ditambah!');
            return redirect()->back();
        }
    }
    public function storeMateriTayang(Request $request)
    {
        $create = MateriTayang::create([
            'judul_id' => $request->judul_id,
            'instruktur_id' => Auth::user()->instruktur->id,
            'materi_sebelum' => $request->materi_sebelum,
            'materi_new' => $request->materi_new
        ]);
        if ($create) {
            alert()->success('Data berhasil Ditambah!', 'Terimakasih sudah memberi review.');
            return redirect()->back();
        } else {
            alert()->error('Coba lagi...', 'Data gagal ditambah!');
            return redirect()->back();
        }
    }

    public function storePetunjukInstruktur(Request $request)
    {
        $create = PetunjukInstruktur::create([
            'judul_id' => $request->judul_id,
            'instruktur_id' => Auth::user()->instruktur->id,
            'jukins_sebelum' => $request->jukins_sebelum,
            'jukins_new' => $request->jukins_new
        ]);
        if ($create) {
            alert()->success('Data berhasil Ditambah!', 'Terimakasih sudah memberi review.');
            return redirect()->back();
        } else {
            alert()->error('Coba lagi...', 'Data gagal ditambah!');
            return redirect()->back();
        }
    }

    public function storePetunjukPenyelenggara(Request $request)
    {
        $create = PetunjukPenyelenggara::create([
            'judul_id' => $request->judul_id,
            'instruktur_id' => Auth::user()->instruktur->id,
            'jukpen_sebelum' => $request->jukpen_sebelum,
            'jukpen_new' => $request->jukpen_new
        ]);
        if ($create) {
            alert()->success('Data berhasil Ditambah!', 'Terimakasih sudah memberi review.');
            return redirect()->back();
        } else {
            alert()->error('Coba lagi...', 'Data gagal ditambah!');
            return redirect()->back();
        }
    }

    public function storeToolsEvaluasi(Request $request)
    {
        $create = ToolsEvaluasi::create([
            'judul_id' => $request->judul_id,
            'instruktur_id' => Auth::user()->instruktur->id,
            'toolseval_sebelum' => $request->toolseval_sebelum,
            'toolseval_new' => $request->toolseval_new
        ]);
        if ($create) {
            alert()->success('Data berhasil Ditambah!', 'Terimakasih sudah memberi review.');
            return redirect()->back();
        } else {
            alert()->error('Coba lagi...', 'Data gagal ditambah!');
            return redirect()->back();
        }
    }

    public function storePetunjukPraktik(Request $request)
    {
        $create = PetunjukPraktik::create([
            'judul_id' => $request->judul_id,
            'instruktur_id' => Auth::user()->instruktur->id,
            'jukpraktik_sebelum' => $request->jukpraktik_sebelum,
            'jukpraktik_new' => $request->jukpraktik_new
        ]);
        if ($create) {
            alert()->success('Data berhasil Ditambah!', 'Terimakasih sudah memberi review.');
            return redirect()->back();
        } else {
            alert()->error('Coba lagi...', 'Data gagal ditambah!');
            return redirect()->back();
        }
    }
}
