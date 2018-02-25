@extends('layouts.page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>
                    <i class="fa fa-truck"></i> MAX KARGO
                    <small class="float-right">{{ $task->created_at->format('d/m/Y') }}</small>
                </h2>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                PENGIRIM
                <address>
                    <strong>{{ $task->sender['name'] }}</strong><br />
                    {{ $task->sender['address'] }}<br />
                    Telepon: {{ $task->sender['phone'] }}<br />
                    Email: {{ $task->sender['email'] }}
                </address>
            </div>
            <div class="col">
                PENERIMA
                <address>
                    <strong>{{ $task->to['name'] }}</strong><br />
                    {{ $task->to['address'] }}<br />
                    Telepon: {{ $task->to['phone'] }}<br />
                    Email: {{ $task->to['email'] }}
                </address>
            </div>
            <div class="col">
                <h3 class="text-center"><strong>{{ $task->order_number }}</strong></h3>
                <p>
                    Kota Asal: {{ $task->cost->origin->name }} <br />
                    Kota Tujuan: {{ $task->cost->destination->name }}
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr class="text-center">
                            <th scope="col">Jenis Barang</th>
                            <th scope="col">Berat Barang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td scope="row">{{ $task->commodity->name }}</td>
                            <td>{{ $task->weight }} Kg</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Metode Pembayaran</th>
                            <td width="1px">:</td>
                            <td><strong>{{ $payment_method->display_name }}</strong></td>
                        </tr>
                        <tr>
                            <th scope="row">Status Pembayaran</th>
                            <td width="1px">:</td>
                            <td>{!! ($task->payment['status'] == 1) ? '<label class="text-success"><strong>LUNAS</strong></label>' : '<label class="text-danger"><strong>BELUM LUNAS</strong></label>' !!}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Charge</th>
                            <td width="1px">:</td>
                            <td>0%</td>
                        </tr>
                        <tr>
                            <th scope="row">Total Refund</th>
                            <td width="1px">:</td>
                            <td>{{ toRupiah($task->payment['total']) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


            <hr>

            <div class="row">
                <div class="col">
                    <div class="card bg-light">
                        <div class="card-header">
                            <strong>Petunjuk Pembayaran</strong>
                        </div>
                        <div class="card-body">
                            <strong>Invoice {{ $task->order_number }}</strong> <br>
                            Total: {{ toRupiah($task->payment['total']) }}
                            <hr>
                            <strong>Data Bank</strong>
                            {!! $payment_method->description !!}
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-white bg-success">
                        <div class="card-header">
                            Refund
                        </div>
                        <div class="card-body">
                          <form action="{{ route('abort', $task->id) }}" class="" method="post" style="display:inline">
                              {{ csrf_field() }}
                              {{ method_field('PUT') }}
                              <input type="number" name="norek" class="form-control" value="" placeholder="Nomor Rekening Pengembalian" required>
                              <button type="submit" class="btn btn-danger">Batalkan Permintaan</button>
                          </form>
                        </div>
                    </div>
                </div>
            </div>

    </div>

@endsection
