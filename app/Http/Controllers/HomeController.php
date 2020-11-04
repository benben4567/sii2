<?php

namespace App\Http\Controllers;

use App\Instruktur;
use App\Peserta;
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
        $nama = Peserta::find(Auth::user()->instruktur->peserta_id)->nama;
        return view('home', compact('nama'));
    }
}
