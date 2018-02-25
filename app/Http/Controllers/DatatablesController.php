<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Task;
use App\Models\Cost;
use App\Models\Origin;
use App\Models\Destination;
use Illuminate\Http\Request;

class DatatablesController extends Controller
{
    public function origins()
    {
        $model = Origin::query();

        return DataTables::eloquent($model)->toJson();
    }

    public function destinations()
    {
        $model = Destination::query();

        return DataTables::eloquent($model)->toJson();
    }

    public function costs()
    {
        $model = Cost::query();

          return DataTables::eloquent($model->with('origin', 'destination'))
                      ->editColumn('base_rate', function($model) {
                          return $model->base_rate * 100;
                      })
                      ->toJson();
    }

    public function tasks(Request $request)
    {
        $model = Task::query();

        return DataTables::eloquent($model->ofStatus((int)$request->input('status_id')))->toJson();
    }
}
