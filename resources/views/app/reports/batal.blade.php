@extends('layouts.app')

@section('content')
  {{-- @php
  $get =explode('.',Route::current()->action['as']);
    dd($get[0]);

  @endphp --}}
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h4 class="title">{{ $title }}</h4>
          <p class="category">{{ $description }}</p>
          <br>

          <div class="card">
            <div class="card-content">
              <div class="toolbar">
                <!--Here you can write extra buttons/actions for the toolbar-->
                @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
              </div>
              <form action="{{route('reports.search')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="type" value="batal">
                <div class="card-content">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" class="form-control" required value="{{old('tanggal_mulai')}}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Tanggal Sampai</label>
                        <input type="date" name="tanggal_sampai" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label> </label>
                        <input type="submit" name="submit" value="Submit" class="form-control btn btn-fill btn-info">
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          @if ($show_result == 1)
            <div class="card">
              <div class="card-content">
                <div class="card-header">
                  <h4 class="card-title">
                    <div class="row">
                      <div class="col-md-10">
                        @if ($tanggal_mulai == $tanggal_sampai)
                          Hasil Pencarian : <strong>{{convert_to_tanggal($tanggal_mulai)}}</strong>
                        @else
                          Hasil Pencarian : <strong>{{convert_to_tanggal($tanggal_mulai) . ' - ' .convert_to_tanggal($tanggal_sampai)}}</strong>
                        @endif

                      </div>
                      <div class="col-md-2">
                        <a href="{{route('reports.print',['type'=>'batal','tanggal_mulai'=>$tanggal_mulai,'tanggal_sampai'=>$tanggal_sampai])}}" target="_blank" class="btn btn-default"><i class="ti-printer"></i> Print</a>
                      </div>
                    </div>
                  </h4>
                </div>
                <div class="fresh-datatables table-responsive">
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
                        <th>Biaya</th>
                        {{-- <th width="200">Aksi</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($query as $data => $value)
                        <tr>
                          <td>{{ $data +1 }}</td>
                          <td>{{ $value->sender['name'] }}</td>
                          <td>{{ $value->order_number }}</td>
                          <td>{{ $value->commodity->name }}</td>
                          <td>{{ $value->weight }} Kg</td>
                          <td>{{ $value->to['address'] }}</td>
                          <td>{{ $value->to['name'] }}</td>
                          <?php
                          $total = $total + $value->payment['total'];
                          ?>
                          <td>{{ toRupiah($value->payment['total']) }}</td>
                          {{-- <td>
                            <button type="button" class="btn btn-default btn-sm btn-show" data-id="{{ $value->id }}" data-toggle="modal" data-target=".bs-example-modal-lg">Lihat</button>
                          </td> --}}
                        </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <th colspan="5">Total Penghasilan </th>
                      <th colspan="3">{{toRupiah($total)}} </th>
                    </tfoot>
                  </table>
                </div>

              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection

@section('page_script')
  <script type="text/javascript">
  $('#datatables').DataTable({
    "pagingType": "full_numbers",
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "responsive": true,
    "language": {
      "search": "_INPUT_",
      "searchPlaceholder": "Cari Data",
    },
    "columnDefs": [
      { "orderable": false, "searchable": false, "targets": 5 },
      { "className": "text-center", "targets": "_all" }
    ]
  });

  $(".input-status").change(function () {
    swal({
      title: 'Apakah kamu yakin untuk mengubah status pengiriman ?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonClass: 'btn btn-success btn-fill',
      cancelButtonClass: 'btn btn-danger btn-fill',
      confirmButtonText: 'Ubah',
      cancelButtonText: 'Batal',
      buttonsStyling: false
    }).then(() => {
      $(this).parent().submit();
    });
  });

  $(".btn-show").click(function () {
    $("#isLoading").show();
    $("#viewResults").hide();

    let self = $(this);
    let id   = self.data('id');
    let url  = document.head.querySelector('meta[name="app-url"]').content;

    let toRupiah = (value) => {
      let rupiah = '';
      let valueRef = value.toString().split('').reverse().join('');
      for (let i = 0; i < valueRef.length; i++) {
        rupiah  += valueRef[i];
        if ((i + 1) % 3 === 0 && i !== (valueRef.length - 1)) {
          rupiah += '.';
        }
      }

      return `Rp. ${rupiah.split('').reverse().join('')},00`;
    }

    axios.get(`${url}/api/tasks/${id}`).then(function (response) {
      let task = response.data
      let i = 1

      $("#order_number").text(task.order_number);
      $("#senderName").text(task.sender.name);
      $("#senderAddress").text(task.sender.address);
      $("#senderPhone").text(task.sender.phone);
      $("#senderEmail").text(task.sender.email);

      $("#toName").text(task.to.name);
      $("#toAddress").text(task.to.address);
      $("#toPhone").text(task.to.phone);
      $("#toEmail").text(task.to.email);

      $("#origin").text(task.cost.origin.name);
      $("#destination").text(task.cost.destination.name);

      $("#commodity").text(task.commodity.name);
      $("#weight").text(`${task.weight} Kg`);

      $("#payment_method").text(task.payment.method);
      $("#payment_status").html((task.payment.status == 1) ? '<label><strong  class="text-success">LUNAS</strong></label>' : '<label><strong class="text-danger">BELUM LUNAS</strong></label>')

      $("#cost").text(toRupiah(task.payment.total));
      $("#payment_admin").text(toRupiah(0));
      $("#payment_total").text(toRupiah(task.payment.total));

      $.each(task.letters, function (key, value) {
        $("#letters").html(`<a href="${url}/file/${value}" target="_blank">Surat ${i++}</a>`)
      })

      $(".btn-print").data("id", task.id);

      $("#isLoading").hide();
      $("#viewResults").show();
    }).catch((error) => {
      console.log(error);
    });
  });

  // $(".btn-print").click(function () {
  //     let self = $(this);
  //     let id = self.data('id');
  //     let url = `http://max-kargo.test/prints/invoice/${id}`;
  //     self.attr("href", url);
  // });

  </script>
@endsection

@section('modal')
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          {{-- <h4 class="modal-title" id="myModalLabel">Modal title</h4> --}}
        </div>
        <div class="modal-body">
          <div id="isLoading" class="text-center">
            <i class="fa fa-spinner fa-spin fa-5x fa-fw"></i><br />
            <p>Menggambil data dari server...</p>
          </div>
          <div id="viewResults" style="display:none">
            <div class="row">
              <div class="col-md-4">
                PENGIRIM
                <address>
                  <strong id="senderName"></strong><br />
                  <span id="senderAddress"></span><br />
                  Telepon: <span id="senderPhone"></span><br />
                  Email: <span id="senderEmail"></span>
                </address>
              </div>
              <div class="col-md-4">
                PENERIMA
                <address>
                  <strong id="toName"></strong><br />
                  <span id="toAddress"></span><br />
                  Telepon: <span id="toPhone"></span><br />
                  Email: <span id="toEmail"></span>
                </address>
              </div>
              <div class="col-md-4">
                <h3 class="text-center"><strong id="order_number"></strong></h3>
                <p>
                  Kota Asal: <span id="origin"></span> <br />
                  Kota Tujuan: <span id="destination"></span>
                </p>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col" class="text-center">Jenis Barang</th>
                      <th scope="col" class="text-center">Berat Barang</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="text-center">
                      <td scope="row" id="commodity"></td>
                      <td id="weight"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <table class="table">
                  <tbody>
                    <tr>
                      <th scope="row">Metode Pembayaran</th>
                      <td width="1px">:</td>
                      <td><strong id="payment_method">TUNAI</strong></td>
                    </tr>
                    <tr>
                      <th scope="row">Status Pembayaran</th>
                      <td width="1px">:</td>
                      <td id="payment_status"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-md-6">
                <table class="table">
                  <tbody>
                    <tr>
                      <th scope="row">Biaya Kirim</th>
                      <td width="1px">:</td>
                      <td class="text-right" id="cost"></td>
                    </tr>
                    <tr>
                      <th scope="row">Admin</th>
                      <td width="1px">:</td>
                      <td class="text-right" id="payment_admin"></td>
                    </tr>
                    <tr>
                      <th scope="row">Total</th>
                      <td width="1px">:</td>
                      <td class="text-right"><strong id="payment_total"></strong></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12" id="letters"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
