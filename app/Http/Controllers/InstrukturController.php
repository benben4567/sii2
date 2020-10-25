<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstrukturController extends Controller
{
    public function index()
    {
      return view('page.instruktur.index');
    }

    public function show()
    {
      return view('page.instruktur.show');
    }

    public function create()
    {
      return view('page.instruktur.create');
    }

    public function edit()
    {
      return view('page.instruktur.edit');
    }
}
