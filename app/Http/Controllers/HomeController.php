<?php

namespace App\Http\Controllers;

use App\{Peserta, Instruktur, Magang, Mengajar, PendalamanMateri, Bidang, SertifikasiBidang};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $auth = Auth::user()->instruktur->id;
        // dd($auth);
        if (isset(Auth::user()->instruktur->id)) {
            $magang = Magang::where('instruktur_id', Auth::user()->instruktur->id)
                ->orderBy('id_magang', 'desc')->count();
        } else {
            $magang = Magang::where('instruktur_id', isset(Auth::user()->instrukturs()->first()->instruktur_id))
                ->orderBy('id_magang', 'desc')->count();
        }
        if (isset(Auth::user()->instruktur->id)) {
            $mengajar = Mengajar::where('instruktur_id', Auth::user()->instruktur->id)
                ->orderBy('id_mengajar', 'desc')->count();
        } else {
            $mengajar = Mengajar::where('instruktur_id', isset(Auth::user()->instruktur->id))
                ->orderBy('id_mengajar', 'desc')->count();
        }
        if (isset(Auth::user()->instruktur->id)) {
            $materi = PendalamanMateri::where('instruktur_id', Auth::user()->instruktur->id)
                ->orderBy('id_materi', 'desc')->count();
        } else {
            $materi = PendalamanMateri::where('instruktur_id', isset(Auth::user()->instruktur->id))
                ->orderBy('id_materi', 'desc')->count();
        }
        if (isset(Auth::user()->instruktur->id)) {
            $sertifikasi_bidang = SertifikasiBidang::where('instruktur_id', Auth::user()->instruktur->id)
                ->orderBy('id_sertifikasi_bidang', 'desc')->count();
        } else {
            $sertifikasi_bidang = SertifikasiBidang::where('instruktur_id', isset(Auth::user()->instruktur->id))
                ->orderBy('id_sertifikasi_bidang', 'desc')->count();
        }

        return view('home', compact('magang', 'mengajar', 'materi', 'sertifikasi_bidang'));
    }
}
