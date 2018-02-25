<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Charge;

class ChargeController extends Controller
{
    public function index()
    {
      $charges = Charge::all();
      return view('app.charges.index', [
        'title'       => 'Charge',
        'url'         => route('charges.index'),
        'description' => '',
        'charges'       => $charges
      ]);
    }

    public function get_charge($id)
    {
      $charge   = Charge::find($id);

      return $charge;
    }
    public function update(Request $request,$id)
    {
      $charge = Charge::find($id);
      $charge->qty = $request->qty;
      if ($charge->save()) {
        return redirect()->route('charges.index')->with('message', format_message('Success update data !','success'));
      }
    }
}
