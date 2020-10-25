<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarningController extends Controller
{
    public function index()
    {
      return view('page.early_warning.index');
    }

    public function show()
    {
      return view('page.early_warning.kategoriReview');
    }

    // menampilkan halaman tambah
    public function create()
    {
      return view();
    }


    // menyimpan data dari halaman tambah
    public function store()
    {

    }

    // menampilkan halaman edit
    public function edit()
    {
      return view();
    }

    // menyimpan data dari halaman edit
    public function update()
    {

    }
}
