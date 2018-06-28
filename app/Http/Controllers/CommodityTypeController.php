<?php

namespace App\Http\Controllers;

use App\Models\CommodityType;
use Illuminate\Http\Request;
use Validator;

class CommodityTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $datas = CommodityType::orderBy('created_at','desc')->get();
      return view('app.master.type', [
        'title'         => 'Commodity Type',
        'url'           => route('comoditytype.index'),
        'description'   => '',
        'datas' => $datas,
        'i'             => 1
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $validator = Validator::make($request->all(), [
        'type'      => 'required|unique:commodity_types'
      ]);
      if ($validator->fails()) {
        return redirect()->back()
        ->withErrors($validator)
        ->withInput()
        ->with('message', format_message('Gagal Input !','danger'));
      }

      $type     = $request->type;

      $data = CommodityType::create([
        'type'      => $type
      ]);

      if ($data) {
        return redirect()->route('comoditytype.index')->with('message', format_message('Success insert data !','success'));
      }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return CommodityType::where('id',$id)->get();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data =  CommodityType::find($id);

        $data->type = $request->type;
        if ($data->save()) {
          return redirect()->route('comoditytype.index')->with('message', format_message('Success update data !','success'));
        }else {
          return redirect()->route('comoditytype.index')->with('message', format_message('Failed update data !','danger'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
      try {
        $data = CommodityType::where('id', $id)->delete();
        return redirect()->route('comoditytype.index')->with('message', format_message('Success delete data !','success'));
  
      } catch ( \Illuminate\Database\QueryException $e) {
        // var_dump($e->errorInfo );
        return redirect()->route('comoditytype.index')->with('message', format_message('Data masih digunakan dicommodity !','danger'));
      }
     }
}
