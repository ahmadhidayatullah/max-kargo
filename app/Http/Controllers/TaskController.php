<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Cost;
use App\Models\Origin;
use App\Models\Status;
use App\Models\Destination;
use Illuminate\Http\Request;
use Validator;
use Mail;

class TaskController extends Controller
{
    private $to;

    public function index($status_name)
    {
        $status  = Status::select('id', 'name', 'display_name', 'description')->where('name', $status_name)->first();
        $statues = Status::select('id', 'name', 'display_name')->get();

        $tasks = Task::where('status_id', $status->id)->orderBy('updated_at', 'desc')->get();

        return view('app.tasks.' . $status_name, [
            'title'       => $status->display_name,
            'description' => $status->description,
            'statues'     => $statues,
            'status_id'   => $status->id,
            'url'         => route('tasks.index', $status->name),
            'tasks'       => $tasks,
            'i'           => 1
        ]);
    }

    public function list_order()
    {
      $tasks = Task::orderBy('updated_at', 'desc')->get();

      return view('app.tasks.list', [
          'title'       => 'Data Pemesanan',
          'description' => '',
          'url'         => route('orders.list'),
          'tasks'       => $tasks,
          'i'           => 1
      ]);
    }
    public function print_order()
    {
      $tasks = Task::orderBy('updated_at', 'desc')->get();

      return view('app.tasks.print', [
          'tasks'       => $tasks,
          'i'           => 1
      ]);
    }

    public function show($id)
    {
        return Task::with('cost.origin', 'cost.destination', 'commodity')->find($id);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $type = $request->input('type');

        if ($type == 'status') {
            $status_name = $request->input('status');
            $status = Status::select('id')->where('name', $status_name)->first();

            $task->update([
                'status_id' => $status->id
            ]);

            if ($status_name == 'm') {
              $data = [
          			'name' => $task->sender['name'],
          			'status' => 'manifest',
                'no_order' => $task->order_number,
          		];
            }elseif ($status_name == 'op') {
              $data = [
          			'name' => $task->sender['name'],
          			'status' => 'On Progress',
                'no_order' => $task->order_number,
          		];
            }elseif ($status_name == 'ot') {
              $data = [
          			'name' => $task->sender['name'],
          			'status' => 'On Transit',
                'no_order' => $task->order_number,
          		];
            }elseif ($status_name == 'd') {
              $data = [
          			'name' => $task->sender['name'],
          			'status' => 'Delivered',
                'no_order' => $task->order_number,
          		];
            }

            $this->to = $task->sender['email'];
            Mail::send('pages.email',$data, function($message){
              $message->to($this->to,'To Member')->subject('Konfirmasi Status Pesanan');
              $message->from('gamingclass605@gmail.com','Max Cargo');
            });

            return redirect()->route('tasks.index', $status_name);
        } else if ($type == 'payment') {
            $payment_status = $request->input('payment_status');

            $payment = $task->payment;

            $payment['status'] = $payment_status;

            $task->payment = $payment;

            $task->save();

            return redirect()->route('tasks.index', 'm');
        }
    }

    public function update_weight(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
        'weight'      => 'required|numeric'
      ]);
      if ($validator->fails()) {
        return redirect()->back()
        ->withErrors($validator)
        ->withInput()
        ->with('message', format_message('Gagal Input !','danger'));
      }

    $task = Task::find($id);
    $cost = Cost::where('id', $task->cost_id)->first();
      $data = [
            'weight' => $request->weight,
            'payment' => [
                'status' => 0,
                'method' => $task->payment['method'],
                'total'  => payment_total($request->weight, $cost->price['minimal'], $cost->price['nominal'], $cost->price['plus_45'], $cost->price['plus_100']),
                'date'   => null
            ],
            'status_id' => '1'
        ];
        $update = $task->update($data);

      if ($update) {
        return redirect()->route('tasks.index', 'pe')->with('message', format_message('Berhasil masukkan berat barang !','success'));
      }else {
          return redirect()->route('tasks.index', 'pe')->with('message', format_message('Gagal Update !','danger'));
      }
    }

    public function destroy($id)
    {
        Task::find($id)->delete();

        return redirect()->route('tasks.index', 'm');
    }

    public function email()
    {
      // $input = [
      //   'name'  =>  'ahmad',
      //   'email' =>  'ahmadhidayatullah95@gmail.com'
      // ];
      $data = [
  			'name' => 'Ahmad',
  			'code' => '11231231231313123',
  		];
      // $send = Mail::send('pages.email', $data, function($message) use ($input) {
      //   //$message->from('appmakassar@gmail.com', 'Makassar App');
      //   $message->to($input['email'], $input['name'])->subject('Please verify your acount registration!');
      // });
      Mail::send('pages.email',$data, function($message){
        $message->to('ahmadhidayatullah95@gmail.com','To ahmad')->subject('test email');
        $message->from('gamingclass605@gmail.com','Max Cargo');
      });
    }
    // Route
    // email.blade
    //setting google account
}
