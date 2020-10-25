<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JudulController extends Controller
{
    public function index()
    {
      // if ($role == 'admin') {
      //   return view('page.judul.index_admin');
      // } else {
      //   return view('page.judul.index_instruktur');
      // }
      return view('page.judul.index_admin');
    }

    public function create()
    {
      return view('page.judul.create');
    }

    public function edit()
    {
      return view('page.judul.edit');
    }
}
