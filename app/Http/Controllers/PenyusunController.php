<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenyusunController extends Controller
{
  public function index()
  {
    // return view('page.penyusun.index'); //admin
    return view('page.pengalaman.penyusun.index'); //instruktur
  }

  public function create()
  {
    // return view('page.penyusun.create'); //admin
    return view('page.pengalaman.penyusun.create'); //instruktur
  }

  public function edit()
  {
    // return view('page.penyusun.edit'); //admin
    return view('page.pengalaman.penyusun.edit'); //instruktur
  }
}
