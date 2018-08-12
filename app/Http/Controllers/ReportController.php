<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class ReportController extends Controller
{
    private $tgl_mulai;
    private $tgl_akhir;

    public function index(Request $request)
    {
      return view('app.reports.index', [
        'title'       => 'Laporan Gabungan',
        'url'         => route('reports.index'),
        'description' => '',
        'show_result' => 0
      ]);
    }

    public function masuk(Request $request)
    {
      return view('app.reports.masuk', [
        'title'       => 'Laporan Masuk',
        'url'         => route('reports.masuk'),
        'description' => '',
        'show_result' => 0
      ]);
    }

    public function batal(Request $request)
    {
      return view('app.reports.batal', [
        'title'       => 'Laporan Pembatalan',
        'url'         => route('reports.batal'),
        'description' => '',
        'show_result' => 0
      ]);
    }
    public function search(Request $request)
    {
      $validatedData = $request->validate([
        'tanggal_mulai'  => 'required',
        'tanggal_sampai' => 'required',
      ]);

      $type = $request->type;
      $this->tgl_mulai  = $request->tanggal_mulai.' 00:00:00';
      $this->tgl_sampai = $request->tanggal_sampai.' 23:59:59';

      if ($type == 'all') {

        $query  = Task::where(function($query){
            $query->where('created_at', '>=', $this->tgl_mulai);
            $query->where('created_at', '<=', $this->tgl_sampai);
        })
        ->where(function($query){
            $query->where('status_id', '=', 4);
            $query->orWhere('status_id', '=', 5);
            $query->orWhere('isRefund', '=', 1);
        })
        ->withTrashed()->get();

        $view   = 'index';
        $title  = ' Laporan Gabungan';

      }elseif ($type == 'masuk') {
                  
        $query  = Task::where(function($query){
            $query->where('created_at', '>=', $this->tgl_mulai);
            $query->where('created_at', '<=', $this->tgl_sampai);
        })
        ->where(function($query){
            $query->where('status_id', '=', 4);
            $query->orWhere('status_id', '=', 5);
        })->get();

        $view   = 'masuk';
        $title  = ' Laporan Masuk';
      }elseif ($type == 'batal') {

        $query = Task::where([
          ['isRefund', '=', 1],
          ['created_at', '>=', $this->tgl_mulai],
          ['created_at', '<=', $this->tgl_sampai],
        ])->withTrashed()->get();

        $view   = 'batal';
        $title  = ' Laporan Pembatalan';
      }

      return view('app.reports.'.$view, [
        'title'          => $title,
        'url'            => route('reports.'.$view),
        'description'    => '',
        'tanggal_mulai'  => $request->tanggal_mulai,
        'tanggal_sampai' => $request->tanggal_sampai,
        'query'          => $query,
        'show_result'    => 1,
        'total'          => 0
      ]);

    }

    public function print_order($type,$tanggal_mulai,$tanggal_sampai)
    {

      $this->tgl_mulai  = $tanggal_mulai.' 00:00:00';
      $this->tgl_sampai = $tanggal_sampai.' 23:59:59';

      if ($type=='masuk') {

       $query  = Task::where(function($query){
            $query->where('created_at', '>=', $this->tgl_mulai);
            $query->where('created_at', '<=', $this->tgl_sampai);
        })
        ->where(function($query){
            $query->where('status_id', '=', 4);
            $query->orWhere('status_id', '=', 5);
        })->get();


        $title = 'Laporan Pemasukan';
        $view  = 'print';

      }elseif ($type == 'batal') {

        $query = Task::where([
          ['isRefund', '=', 1],
          ['created_at', '>=', $this->tgl_mulai],
          ['created_at', '<=', $this->tgl_sampai],
        ])->withTrashed()->get();

        $title = 'Laporan Pembatalan';
        $view  = 'print';

      }elseif ($type == 'all') {

        $query  = Task::where(function($query){
            $query->where('created_at', '>=', $this->tgl_mulai);
            $query->where('created_at', '<=', $this->tgl_sampai);
        })
        ->where(function($query){
            $query->where('status_id', '=', 4);
            $query->orWhere('status_id', '=', 5);
            $query->orWhere('isRefund', '=', 1);
        })
        ->withTrashed()->get();

        $title = 'Laporan Pemasukan dan Pembatalan';
        $view  = 'print_all';
      }



      return view('app.reports.'.$view, [
        'title'          => $title,
        'url'            => route('reports.index'),
        'description'    => '',
        'tanggal_mulai'  =>$this->tgl_mulai,
        'tanggal_sampai' => $this->tgl_sampai,
        'query'          => $query,
        'show_result'    => 1,
        'total'          => 0
      ]);
    }
}
