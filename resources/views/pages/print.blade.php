<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  	<meta charset="utf-8" />
  	<link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
  	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  	<title>Max Kargo</title>

  	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Core Css --}}
    <link rel="stylesheet" href="{{ asset('css/yeti.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sticky-footer-navbar.css') }}">

    {{-- Fonts --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body onload="window.print();">
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
                        <th scope="row">Total</th>
                        <td width="1px">:</td>
                        <td>{{ toRupiah($task->payment['total']) }}</td>
                    </tr>
                </tbody>
              </table>
          </div>
      </div>

  </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>
