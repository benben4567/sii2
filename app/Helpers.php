<?php

/*
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

/**
* Description of helpers
*
* @author @Bossnanda
*/
function setActive($path, $active = 'active') {
  return call_user_func_array('Request::is', (array)$path) ? $active : '';
}
/*
function alert($message = null, $title = '') {
return call_user_func_array('Alert::', $path.';
}
*/
function setShow($path, $show = 'show') {
  return call_user_func_array('Request::is', (array)$path) ? $show : '';
}

function tanggal_indonesia($tgl, $tampil_hari=true){
  $nama_hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
  $nama_bulan = array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

  $tahun = substr($tgl,0,4);
  $bulan = $nama_bulan[(int)substr($tgl,5,2)];
  $tanggal = substr($tgl,8,2);

  $text="";

  if($tampil_hari){
    $urutan_hari = date('w',mktime(0,0,0, substr($tgl,5,2),$tanggal,$tahun));
    $hari = $nama_hari[$urutan_hari];
    $text .= $hari.", ";

  }
  $text .= $tanggal ." ". $bulan ." ". $tahun;
  return $text;
}


function format_uang($angka_uang){
  $hasil =number_format($angka_uang,0,',','.');
  return $hasil;
}


function formatDate($array) {
  $string = date('Y-m-d', strtotime($array));
  return $string;
}

if (! function_exists('num_row')) {
  function num_row($page, $limit) {
    if (is_null($page)) {
      $page = 1;
    }

    $num = ($page * $limit) - ($limit - 1);
    return $num;
  }
}

function terbilang($angka){
  $angka = abs($angka);
  $baca = array("","satu","dua","tiga","empat","lima","enam","tujuh","delapan","sembilan","sepuluh","sebelas");
  $terbilang = "";
  if($angka < 12){
    $terbilang = " ".$baca[$angka];
  }else if($angka < 12){
    $terbilang = terbilang($angka - 10). " belas";
  }else if($angka < 100){
    $terbilang = terbilang($angka/10). " puluh". terbilang($angka % 10);
  }else if($angka < 200){
    $terbilang = " seratus". terbilang($angka - 100);
  }else if($angka < 1000){
    $terbilang = terbilang($angka/100). " ratus" . terbilang($angka % 100);
  }else if($angka < 2000){
    $terbilang = " seribu". terbilang($angka - 1000);
  }else if($angka < 1000000){
    $terbilang = terbilang($angka/1000). " ribu". terbilang($angka % 1000);
  }else if($angka < 1000000000){
    $terbilang = terbilang($angka/1000000). " juta" . terbilang($angka % 1000000);
  }
  return $terbilang;
}


function awalNama($value)
{
  $splitName = explode(' ', $value, 3); // batasi ambil hanya 2 values, contoh untuk nama seperti Billy Bob Jones = Billy Bob
  $first_name = $splitName[0].' '.$splitName[1];
  $last_name = $splitName[0];
  $last_name = !empty($splitName[2]) ? $first_name : $last_name; // jika nama setelah first name tidak ada maka tampilkan first name
  return $last_name;
}
