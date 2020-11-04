<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warning;
use Illuminate\Support\Facades\Auth;

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


  // menyimpan data dari halaman tambah
  public function store(Request $request)
  {
    $messages = [
      'required' => ' :Attribute wajib diisi!',
      'min' => 'Informasi pendukung minimal diisi 50 karakter'
    ];

    $validasi = $request->validate([
      'informasi_pendukung' => 'required|min:10',
      'aspek' => 'required'
    ], $messages);

    $inputvalue = $request->all();
    $arraytostring = implode(',', $request->input('aspek'));
    $inputvalue['aspek'] = $arraytostring;
    $input = auth()->user()->warnings()->create($inputvalue);
    if ($input) {
      alert()->success('Data berhasil Ditambah!', 'Terimakasih sudah memberi warning.');
      return redirect()->back();
    } else {
      alert()->error('Coba lagi...', 'Data gagal ditambah!');
      return redirect()->back();
    }
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
