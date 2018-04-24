<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Cost;
use App\Models\Origin;
use App\Models\Commodity;
use App\Models\CommodityType;
use App\Models\Destination;
use Illuminate\Http\Request;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.costs.index', [
            'title' => 'Biaya Pengiriman',
            'url'   => route('costs.index')
        ]);
    }

    public function get_types($id)
    {
      return Commodity::where('commodity_type_id',$id)->get();
    }

    public function index2()
    {
      $origins        = Origin::all();
      $destinations   = Destination::all();
      $commodities     = Commodity::all();
      $commodity_types     = CommodityType::all();
      $costs = Cost::with('origin', 'destination','commodity')->orderBy('created_at','desc')->get();
      return view('app.master.cost', [
        'title'         => 'Cost',
        'url'           => route('costs.index'),
        'description'   => '',
        'origins'       => $origins,
        'destinations'  => $destinations,
        'commodities'   => $commodities,
        'commodity_types' => $commodity_types,
        'costs'         => $costs,
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
        'origin_id'         => 'required|numeric',
        'destination_id'   => 'required|numeric',
        'commodity_id'      => 'required|numeric',
        'commodity_type_id' => 'required|numeric'
      ]);
      if ($validator->fails()) {
        return redirect()->back()
        ->withErrors($validator)
        ->withInput()
        ->with('message', format_message('Gagal Input !','danger'));
      }

      $data = [
        'origin_id'       => $request->origin_id,
        'destination_id' => $request->destination_id,
        'commodity_id'    => $request->commodity_id,
        'commodity_type_id'    => $request->commodity_type_id,
        'price' => [
          'minimal'   => $request->minimal,
          'nominal'   => $request->nominal,
          'plus_45'   => $request->plus_45,
          'plus_100'  => $request->plus_100
        ],
        'base_rate'   => '0.9'
      ];

      $cost = Cost::create($data);

      if ($cost) {
        return redirect()->route('costs.index')->with('message', format_message('Success insert data !','success'));
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
        $cost = Cost::with('origin', 'destination','commodity')->where('id',$id)->get();
        $origin = Origin::all();
        $destination = Destination::all();
        $commodity = Commodity::all();

        $data = [
          'cost'        => $cost,
          'origin'      => $origin,
          'destination' => $destination,
          'commodity'   => $commodity,
        ];
        return $data;
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

      $validator = Validator::make($request->all(), [
        'origin_id'         => 'required|numeric',
        'destination_id'   => 'required|numeric',
        'commodity_id'      => 'required|numeric'
      ]);
      if ($validator->fails()) {
        return redirect()->back()
        ->withErrors($validator)
        ->withInput()
        ->with('message', format_message('Gagal Input !','danger'));
      }

      $cost = Cost::find($id);
      $cost->origin_id        = $request->origin_id;
      $cost->destination_id  = $request->destination_id;
      $cost->commodity_id     = $request->commodity_id;
      $price = [
        'minimal'   => $request->minimal,
        'nominal'   => $request->nominal,
        'plus_45'   => $request->plus_45,
        'plus_100'  => $request->plus_100
      ];
      $cost->price = $price;

      if ($cost->save()) {
        return redirect()->route('costs.index')->with('message', format_message('Success update data !','success'));
      }else {
        return redirect()->route('costs.index')->with('message', format_message('Failed update data !','danger'));
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
      Cost::find($id)->delete();

      return redirect()->route('costs.index')->with('message', format_message('Success delete data !','success'));
    }
}
