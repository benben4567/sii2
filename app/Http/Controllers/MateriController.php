<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
      return view('page.materi.index');
    }

    public function create()
    {
      return view('page.materi.tambahmateri');
    }

    public function edit()
    {
      $materi = '';
      return view('page.materi.edit', compact('materi'));
    }
}
