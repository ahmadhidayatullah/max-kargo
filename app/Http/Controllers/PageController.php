<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Cost;
use App\Models\Charge;
use App\Models\Refund;
use App\Models\Origin;
use App\Models\Status;
use App\Models\Commodity;
use App\Models\CommodityType;
use App\Models\Destination;
use App\Models\Confirmation;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use DB;
use Mail;

class PageController extends Controller
{
    private $to;

    public function get_commodities(Request $request)
    {
        $destination_id = $request->destination_id;
        $origin_id      = $request->origin_id;
        $commodity_type_id = $request->commodity_type_id;

        $cost = Cost::with('commodity')->where('origin_id', $origin_id)->where('destination_id', $destination_id)->where('commodity_type_id',$commodity_type_id)->get();

        if ($cost != '') {
          // return Commodity::select('id', 'code', 'name')->where('id', $cost->commodity_id)->get();
          return $cost;
        }else {
          return 'kosong';
        }

    }

    public function index()
    {
        $options = [
            'origins' => Origin::select('id', 'name', 'province')->get(),
            'destinations' => Destination::select('id', 'name', 'province')->get(),
            'commodities' => Commodity::select('id', 'code', 'name')->get(),
            'commodity_types' => CommodityType::select('id', 'type')->get()
        ];

        return view('pages.index', [
            'options' => $options
        ]);
    }

    public function index2(Request $request)
    {
        $cost = Cost::with('origin', 'destination','commodity')
                  ->where('origin_id', $request->origin_id)
                  ->where('destination_id', $request->destination_id)
                  ->where('commodity_id', $request->commodity_id)
                  ->first();

        $data = [
            'cost'  => $cost,
            'origin' => $cost->origin,
            'destination' => $cost->destination,
            'commodity' => $cost->commodity,
            'weight' => (double)$request->input('weight')
        ];

        $options = [
            'commodities' => Commodity::select('id', 'code', 'name')->get(),
            'payment_methods' => PaymentMethod::select('id','name', 'display_name')->get()
        ];

        return view('pages.index2', [
            'data' => $data,
            'options' => $options
        ]);
    }

    public function store(Request $request)
    {
        $cost = Cost::where('origin_id', $request->origin_id)
                  ->where('destination_id', $request->destination_id)
                  ->where('commodity_id', $request->commodity_id)
                  ->first();

        $status       = Status::select('id')->where('name', 'pe')->first();
        $order_number = order_number();
        $weight       = (double)$request->input('weight');

        $letters = [];
        $i       = 1;

        foreach ($request->file('letters') as $letter) {
            $letters['letter' . $i++] = $letter->store('letters/' . $order_number);
        }

        $data = [
            'order_number' => $order_number,
            'sender' => [
                'name'    => $request->input('sender_name'),
                'phone'   => '+62' . $request->input('sender_phone'),
                'email'   => $request->input('sender_email'),
                'address' => $request->input('sender_address')
            ],
            'to' => [
                'name'    => $request->input('to_name'),
                'phone'   => '+62' . $request->input('to_phone'),
                'email'   => $request->input('to_email'),
                'address' => $request->input('to_address')
            ],
            'cost_id' => $cost->id,
            'commodity_id' => (int)$request->input('commodity_id'),
            'weight' => $weight,
            'payment' => [
                'status' => 0,
                'method' => $request->input('payment_method'),
                'total'  => payment_total($weight, $cost['price']['minimal'], $cost['price']['nominal'], $cost['price']['plus_45'], $cost['price']['plus_100']),
                'date'   => null
            ],
            'status_id' => $status->id,
            'letters' => $letters
        ];

        $task = Task::create($data);

        $data2 = [
          'name' => $request->input('sender_name'),
          'status' => 'Manifest',
          'no_order' => $order_number,
        ];

        $this->to = $request->input('sender_email');
        Mail::send('pages.email',$data2, function($message){
          $message->to($this->to,'To Member')->subject('Konfirmasi Status Pesanan');
          $message->from('gamingclass605@gmail.com','Max Cargo');
        });

        return view('pages.result', [
            'task' => $task,
            'payment_method' => payment_method($task->payment['method'])
        ]);
    }

    public function search(Request $request)
    {
        if ($request->has('q')) {
            $get_q    = $request->input('q');
            $get_task = Task::where('order_number', $get_q)->first();
            if ($get_task) {
              if ($get_task->payment['method']) {
                $q    = $get_q;
                $task = $get_task;
                $message = (!$get_task) ? 'Nomor resi tidak ditemukan' : null;
                $payment_method = payment_method($task->payment['method']);
              }else {
                $q    = null;
                $task = null;
                $message = 'Nomor Order :'. $get_q . ' Belum Di Set Payment Method Hubungi Admin';
                $payment_method = 'Nomor Order :'. $get_q . 'Belum Di Set';
              }

            }else {
              $q    = null;
              $task = null;
              $message = 'Nomor resi tidak ditemukan';
              $payment_method = null;
            }
        } else {
            $q    = null;
            $task = null;
            $message = null;
            $payment_method = null;
        }

        return view('pages.search', [
            'q'    => $q,
            'task' => $task,
            'message' => $message,
            'payment_method' => $payment_method
        ]);
    }

    public function payment()
    {
        return view('pages.payment');
    }

    public function confirmation(Request $request)
    {
        $order_number = $request->input('order_number');
        $check        = Task::select('id')->where('order_number', $order_number)->first();

        if ($check) {

            $transfer_photo = $request->file('transfer_photo');

            Confirmation::create([
                'order_number'    => $order_number,
                'transfer_date'   => $request->input('transfer_date'),
                'transfer_to'     => $request->input('transfer_to'),
                'transfer_name'   => $request->input('transfer_name'),
                'transfer_amount' => $request->input('transfer_amount'),
                'transfer_photo'  => $transfer_photo->store('confirmations/' . $order_number)
            ]);

            return redirect()->back()->with('ok', 'Konfirmasi pembayaran akan di proses paling lambat 1x24 jam.');
        }

        return redirect()->back()->with('error', 'Nomor resi tidak dikenal.');
    }

    public function cost()
    {
        $options = [
            'origins' => Origin::select('id', 'name', 'province')->get(),
            'destinations' => Destination::select('id', 'name', 'province')->get(),
            'commodities' => Commodity::select('id', 'code', 'name')->get(),
            'commoditiTypes' => CommodityType::select('id', 'type')->get()
        ];
      $costs = Cost::with('origin', 'destination','commodity')->orderBy('created_at','desc')->get();
      return view('pages.cost', [
        'costs'         => $costs,
        'i'             => 1,
        'options' => $options
      ]);
        // $costs = Cost::with('origin', 'destination')->get();
        //
        // return view('pages.cost', [
        //     'costs' => $costs
        // ]);
    }
    public function cek_cost($origin_id,$destination_id,$commodity_id,$kg)
    {
        $cost = Cost::where('origin_id', $origin_id)
                  ->where('destination_id', $destination_id)
                  ->where('commodity_id', $commodity_id)
                  ->first();
        
        $result = payment_total($kg, $cost['price']['minimal'], $cost['price']['nominal'], $cost['price']['plus_45'], $cost['price']['plus_100']);
        $html = "<h4> Biaya : ".toRupiah($result)."</h4>";
        return $html;
    }

    public function commodity()
    {
        $costs = Cost::with('origin', 'destination','commodity')->orderBy('created_at','desc')->get();
      return view('pages.commodity', [
        'costs'         => $costs,
        'i'             => 1
      ]);
    }

    public function get_task($id)
    {
      $charge   = Charge::all();
      $task     = Task::find($id);
      $response = [
        'charge'  => $charge,
        'task_qty'=> $task->payment['total']
      ];
      return $response;
    }

    public function batal($id)
    {
      $get_task = Task::find($id);

      return view('pages.konfirmasi_batal', [
          'task' => $get_task,
          'payment_method' => payment_method($get_task->payment['method'])
      ]);
    }
    public function print_order($id)
    {
      $get_task = Task::find($id);

      return view('pages.print', [
          'task' => $get_task,
          'payment_method' => payment_method($get_task->payment['method'])
      ]);
    }

    public function task(Request $request,$id)
    {
        $task = Task::find($id);
        $task->status_id = '5';
        if($task->save()){
            return redirect('/search?q='.$task->order_number);
        }else{
            return redirect('/');
        }

    }
    public function abort(Request $request, $id)
    {
        $task = Task::find($id);
        if ($task->status_id != 1) {
          return view('pages.cancel', [
              'message' => 'Orderan dengan nomor order '.$task->order_number.' gagal dibatalakan silahkan menuju menu telusur untuk mengetahui lebih jelas'
          ]);
        }else {

          $task->isRefund = 1;
          if ($task->save()) {

            Refund::create([
              'task_id'       => $task->id,
              'method'        => $request->method,
              'nomor_rekening'=> $request->norek,
              'charge'        => $request->charge,
            ]);

            $data2 = [
              'name' => $task->sender['name'],
              'status' => 'Dibatalkan',
              'no_order' => $task->order_number,
            ];

            $this->to = $task->sender['email'];
            Mail::send('pages.email',$data2, function($message){
              $message->to($this->to,'To Member')->subject('Konfirmasi Status Pesanan');
              $message->from('gamingclass605@gmail.com','Max Cargo');
            });

            $task->delete();

            return view('pages.cancel', [
                'message' => 'Orderan dengan nomor order '.$task->order_number.' telah dibatalkan'
            ]);
          }
        }
    }
}
