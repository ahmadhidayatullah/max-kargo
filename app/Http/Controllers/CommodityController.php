<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use Illuminate\Http\Request;
use Validator;

class CommodityController extends Controller
{
    private $title = 'Commodity';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $commodities = Commodity::orderBy('created_at','desc')->get();
      return view('app.master.commodity', [
        'title'       => 'Commodity',
        'url'         => route('commodities.index'),
        'description' => '',
        'commodities'     => $commodities,
        'i'           => 1
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
        'code'      => 'required|unique:commodities',
        'name'      => 'required'
      ]);
      if ($validator->fails()) {
        return redirect()->back()
        ->withErrors($validator)
        ->withInput()
        ->with('message', format_message('Gagal Input !','danger'));
      }

      $code       = $request->code;
      $name       = $request->name;
      $keterangan = $request->keterangan;

      $commodity = Commodity::create([
        'code'      => $code,
        'name'      => $name,
        'keterangan'=> $keterangan,
      ]);

      if ($commodity) {
        return redirect()->route('commodities.index')->with('message', format_message('Success insert data !','success'));
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
        return Commodity::where('id',$id)->get();
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
         $commodity =  Commodity::find($id);

         $commodity->code       = $request->code;
         $commodity->name       = $request->name;
         $commodity->keterangan = $request->keterangan;

         if ($commodity->save()) {
           return redirect()->route('commodities.index')->with('message', format_message('Success update data !','success'));
         }else {
           return redirect()->route('commodities.index')->with('message', format_message('Failed update data !','danger'));
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
        Commodity::find($id)->delete();

        return redirect()->route('commodities.index')->with('message', format_message('Success delete data !','success'));
      }
}
