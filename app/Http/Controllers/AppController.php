<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Status;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function dashboard()
    {
        $statues = Status::select('id', 'name')->get();

        $count = [];

        foreach ($statues as $status) {
            $count[$status->name] = Task::where('status_id', $status->id)->count();
        }

        return view('app.pages.dashboard', [
            'title' => 'Beranda',
            'url'   => route('app.dashboard'),
            'count' => $count
        ]);
    }
}
