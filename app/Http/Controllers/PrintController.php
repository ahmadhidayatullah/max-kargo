<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function invoice($id)
    {
        $task = Task::find($id);

        return view('prints.invoice', [
            'task' => $task
        ]);
    }
}
