<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index()
  {
    return view('page.auth.users.index');
  }

  public function profil()
  {
    return view('page.auth.users.profile');
  }
}
