<?php

namespace App\Http\Controllers;

use App\Models\Confirmation;
use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    public function index()
    {
        $confirmations = Confirmation::orderBy('created_at', 'desc')->get();

        return view('app.confirmations.index', [
            'title' => 'Konfirmasi Pembayaran',
            'description' => '',
            'url' => route('confirmations.index'),
            'confirmations' => $confirmations,
            'i' => 1
        ]);
    }

    public function update(Request $request, $id)
    {
        $confirmation = Confirmation::find($id);

        $confirmation->update([
            'isVerified' => $request->input('isVerified')
        ]);

        return redirect()->route('confirmations.index');
    }
}
