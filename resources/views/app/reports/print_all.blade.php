<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <meta name="app-url" content="{{ url('/') }}">
  
  <title>Max Kargo</title>
  
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
  
  <!-- Bootstrap core CSS     -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Animation library for notifications   -->
  <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet"/>
  
  <!--  Paper Dashboard core CSS    -->
  <link href="{{ asset('css/paper-dashboard.css') }}" rel="stylesheet"/>
  
  <!--  CSS for Demo Purpose, don't include it in your project -->
  {{-- <link href="{{ asset('css/demo.css') }}" rel="stylesheet" /> --}}
  
  <!--  Fonts and icons     -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
  <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">
  
</head>
<body onload="window.print();">
  <div class="row">
    <div class="col-xs-12">
      <div class="card">
        <div class="card-content">
          <div class="card-header">
            <h4 class="card-title">
              <div class="row">
                <h4 class="text-center">{{$title}}</h4>
              </div>
            </h4>
          </div>
          <table id="datatables" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
            <thead>
              <tr>
                <th>No. </th>
                <th>Nama </th>
                <th>Nomor Resi</th>
                <th width="150">Jenis Barang</th>
                <th>Berat Barang</th>
                <th>Tujuan</th>
                <th>Nama Penerima</th>
                <th width="150">Biaya</th>
                {{-- <th width="200">Aksi</th> --}}
              </tr>
            </thead>
            <tbody>
              @php
              $total_batal = 0;
              $total_masuk = 0;
              $weight      = 0;
              @endphp
              @foreach ($query as $data => $value)
              <?php $class = ($value->isRefund == 1) ? 'color:red !important;' : '' ?>
              <tr>
                <td style="{{$class}}">{{ $data +1 }}</td>
                <td style="{{$class}}">{{ $value->sender['name'] }}</td>
                <td style="{{$class}}">{{ $value->order_number }}</td>
                <td style="{{$class}}">{{ $value->commodity->name }}</td>
                <td style="{{$class}}">{{ $value->weight }} Kg</td>
                <td style="{{$class}}">{{ $value->to['address'] }}</td>
                <td style="{{$class}}">{{ $value->to['name'] }}</td>
                <?php
                if ($value->isRefund == 1) {
                  $total_batal = $total_batal + $value->payment['total'];
                }else {
                  $total_masuk = $total_masuk + $value->payment['total'];
                }
                $weight = $weight + $value->weight;
                
                ?>
                <td style="{{$class}}">{{ toRupiah($value->payment['total']) }}</td>
                
              </tr>
              @endforeach
            </tbody>
          </table>
          
          <table class="table table-striped table-bordered table-hover">
            <tr>
              <td>Total Berat</td>
              <td></td>
              <td>{{$weight}} Kg</td>
            </tr>
            <tr>
              <td style="color:red">Warna Merah</td>
              <td></td>
              <td style="color:red">Orderan yang dibatalkan</td>
            </tr>

            <tr>
              <td>Warna Putih</td>
              <td></td>
              <td>Orderan yang berhasil terkirim</td>
            </tr>
          </table>
          
          <table class="table table-striped table-bordered table-hover">
            @php
            $result = $total_masuk - $total_batal;
            @endphp
            <tr>
              <td>Total Pemasukan</td>
              <td>{{toRupiah($total_masuk)}}</td>
              <td>{{terbilang($total_masuk)}}</td>
            </tr>
            <tr>
              <td>Total Pembatalan</td>
              <td>{{toRupiah($total_batal)}}</td>
              <td>{{terbilang($total_batal)}}</td>
            </tr>
            <tr>
              <td><strong>Total</strong></td>
              <td><strong>{{toRupiah($result)}}</strong></td>
              <td><strong>{{terbilang($result)}}</strong></td>
            </tr>
          </table>
          
        </div>
      </div>
      <div class="box-footer">
        
        <div class="row">
          <div class="col-md-3">
            
          </div>
          <div class="col-md-3">
            
          </div>
          <div class="col-md-6 pull-right">
            <table style="margin-right:30px">
              <tr>
                <td>Pemilik Usaha</td>
              </tr>
              <tr>
                <td>
                  <br>
                  <br>
                  <br>
                  <br>
                </td>
              </tr>
              <tr>
                <td><strong>Max Royzer</strong></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/jquery-ui.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/perfect-scrollbar.min.js') }}" type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  
  <!-- Axios -->
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  
  {{-- <!--  Checkbox, Radio & Switch Plugins -->
    <script src="{{ asset('js/bootstrap-checkbox-radio.js') }}"></script>
    
    <!--  Charts Plugin -->
    <script src="{{ asset('js/chartist.min.js') }}"></script>
    
    <!--  Notifications Plugin    -->
    <script src="{{ asset('js/bootstrap-notify.js') }}"></script> --}}
    
    <!-- Sweet Alert 2 plugin -->
    <script src="{{ asset('js/sweetalert2.js') }}"></script>
    
    <!--  Plugin for DataTables.net  -->
    <script src="{{ asset('js/jquery.datatables.js') }}"></script>
    
    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="{{ asset('js/paper-dashboard.js') }}"></script>
  </body>
  </html>
  