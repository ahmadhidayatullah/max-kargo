<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Refund;

class RefundController extends Controller
{
    public function index()
    {
      $refunds = Refund::with('task')->orderBy('updated_at','desc')->get();

      return view('app.refunds.index', [
        'title'       => 'Refund',
        'url'         => route('refunds.index'),
        'description' => '',
        'refunds'     => $refunds
      ]);
    }

    public function update(Request $request, $id)
    {
      $refund = Refund::find($id);
      $refund->is_refund = $request->is_refund;
      if ($refund->save()) {
        return redirect()->route('refunds.index')->with('message', format_message('Berhasil update data !','success'));
      }else {
        return redirect()->route('refunds.index')->with('message', format_message('gagal update data !','danger'));
      }
    }
}
