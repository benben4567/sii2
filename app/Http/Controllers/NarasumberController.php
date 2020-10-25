<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NarasumberController extends Controller
{
    public function index()
    {
      return view('page.pengalaman.narasumber.index');
    }

    // show form create
    public function create()
    {
      return view('page.pengalaman.narasumber.create');
    }

    // shoe form edit
    public function edit()
    {
      return view('page.pengalaman.narasumber.edit');
    }
}
