<?php

use App\Models\Task;
use App\Models\Status;
use App\Models\PaymentMethod;
use App\Models\Setting;

if (!function_exists('setting_website')) {
  function setting_website()
  {
    return Setting::where('id',1)->first();
  }
}
if (!function_exists('set_active')) {
  function set_active($uri, $output = 'active')
  {
    if( is_array($uri) ) {
      foreach ($uri as $u) {
        if (Route::currentRouteName() == $u) {
          return $output;
        }
      }
    } else {
      if (Route::currentRouteName() == $uri){
        return $output;
      }
    }
  }
}
if (!function_exists('set_active_group')) {
  function set_active_group($uri)
  {
    $get =explode('.',Route::current()->action['as']);

    if ($uri == Route::current()->action['as']) {
      return 'active';
    }else {
      if ($uri == $get[0]) {
        return 'in';
      }
    }
  }
}

if (!function_exists('format_message')) {
  function format_message($message,$type)
  {
    return '<div class="alert alert-'.$type.' alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong>'.$message.' </strong>
    </div>';
  }
}

if (!function_exists('statuses')) {
  function statuses()
  {
    return Status::select('name', 'display_name')->get();
  }
}

if (!function_exists('toRupiah')) {
  function toRupiah($value)
  {
    return "Rp " . number_format($value, 2, ',', '.');
  }
}

if (!function_exists('equalsTo')) {
  function equalsTo($a, $b, $result, $default = '')
  {
    return ($a == $b) ? $result : $default;
  }
}

if (!function_exists('payment_status')) {
  function payment_status($status, $action)
  {
    if ($status == 1) {
      $html = '
      <form action="'. $action .'" method="post" style="display:inline">
      ' . csrf_field() . '
      ' . method_field('PUT') . '
      <input type="hidden" name="type" value="payment">
      <input type="hidden" name="payment_status" value="0">
      <button type="button" class="btn btn-success btn-fill btn-sm btn-payment">Lunas</button>
      </form>
      ';
      return $html;
    } else if ($status == 0) {
      $html = '
      <form action="'. $action .'" method="post" style="display:inline">
      ' . csrf_field() . '
      ' . method_field('PUT') . '
      <input type="hidden" name="type" value="payment">
      <input type="hidden" name="payment_status" value="1">
      <button type="button" class="btn btn-danger btn-fill btn-sm btn-payment">Belum Lunas</button>
      </form>
      ';
      return $html;
    } else {
      return 'Status tidak terdaftar.';
    }
  }
}

if (!function_exists('payment_method')) {
  function payment_method($id)
  {
    $fetch =  PaymentMethod::where('id', $id)->first();
    if ($fetch) {
      return $fetch;
    }else {
      return false;
    }
  }
}
if (!function_exists('convert_to_tanggal')) {
  function convert_to_tanggal($tanggal)
  {
    $explode_tanggal = explode('-',$tanggal);
    if ($explode_tanggal[1]=='01') {
      $bulan = 'Januari';
    }elseif ($explode_tanggal[1]=='02') {
      $bulan = 'Februari';
    }elseif ($explode_tanggal[1]=='03') {
      $bulan = 'Maret';
    }elseif ($explode_tanggal[1]=='04') {
      $bulan = 'April';
    }elseif ($explode_tanggal[1]=='05') {
      $bulan = 'Mei';
    }elseif ($explode_tanggal[1]=='06') {
      $bulan = 'Juni';
    }elseif ($explode_tanggal[1]=='07') {
      $bulan = 'Juli';
    }elseif ($explode_tanggal[1]=='08') {
      $bulan = 'Agustus';
    }elseif ($explode_tanggal[1]=='09') {
      $bulan = 'September';
    }elseif ($explode_tanggal[1]=='10') {
      $bulan = 'Oktober';
    }elseif ($explode_tanggal[1]=='11') {
      $bulan = 'November';
    }elseif ($explode_tanggal[1]=='12') {
      $bulan = 'Desember';
    }

    $result = $explode_tanggal[2].' '.$bulan.' '.$explode_tanggal[0];
    return $result;
  }
}

if (!function_exists('penyebut')) {
  function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
      $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
      $temp = penyebut($nilai - 10). " belas";
    } else if ($nilai < 100) {
      $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
      $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
      $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
      $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
      $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
      $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
      $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
      $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
    }
    return $temp;
  }
}
if (!function_exists('terbilang')) {
  function terbilang($nilai) {
    if($nilai<0) {
      $hasil = "minus ". trim(penyebut($nilai));
    } else {
      $hasil = trim(penyebut($nilai));
    }
    return $hasil;
  }

}
