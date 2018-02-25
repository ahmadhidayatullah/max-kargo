<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Validator;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $destionations = Destination::orderBy('created_at','desc')->get();
      return view('app.master.destionation', [
        'title'         => 'Destionation',
        'url'           => route('destinations.index'),
        'description'   => '',
        'destionations' => $destionations,
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
        'code'      => 'required|unique:destinations',
        'name'      => 'required',
        'province'  => 'required'
      ]);
      if ($validator->fails()) {
        return redirect()->back()
        ->withErrors($validator)
        ->withInput()
        ->with('message', format_message('Gagal Input !','danger'));
      }

      $code     = $request->code;
      $name     = $request->name;
      $province = $request->province;

      $destination = Destination::create([
        'code'      => $code,
        'name'      => $name,
        'province'  => $province,
      ]);

      if ($destination) {
        return redirect()->route('destinations.index')->with('message', format_message('Success insert data !','success'));
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
        return Destination::where('id',$id)->get();

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
        $destionation =  Destination::find($id);

        $destionation->code = $request->code;
        $destionation->name = $request->name;
        $destionation->province = $request->province;

        if ($destionation->save()) {
          return redirect()->route('destinations.index')->with('message', format_message('Success update data !','success'));
        }else {
          return redirect()->route('destinations.index')->with('message', format_message('Failed update data !','danger'));
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
       Destination::find($id)->delete();

       return redirect()->route('destinations.index')->with('message', format_message('Success delete data !','success'));
     }
}
