@extends('layouts.page')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('search') }}" method="get">
                    <div class="row">
                        <div class="col">
                            <div class="input-group">
                                <input type="number" class="form-control" placeholder="Masukan Nomor Resi" name="q" value="{{ $q }}" required />
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-secondary"><i class="fa fa-search fa-fw"></i> Cari</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @if ($message)
            <div class="row mt-5">
                <div class="col">
                    <h3 class="text-center">{{ $message }}</h3>
                </div>
            </div>
        @endif

        @if ($task)

            <div class="row mt-3">
                <div class="col">
                    <div class="alert alert-info" role="alert">
                        <h3 class="alert-heading">Status Pengiriman</h3>
                        <h4>{{ $task->status->display_name }}</h4>
                        <p>{{ $task->status->description }}</p>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
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
                                <th scope="row">Biaya Kirim</th>
                                <td width="1px">:</td>
                                <td class="text-right">{{ toRupiah($task->payment['total']) }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Admin</th>
                                <td width="1px">:</td>
                                <td class="text-right">{{ toRupiah(0) }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Total</th>
                                <td width="1px">:</td>
                                <td class="text-right"><strong>{{ toRupiah($task->payment['total']) }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            @if ($task->payment['method'] != 'cash' && $task->payment['status'] == 0)
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
                                Jangan lupa konfirmasi
                            </div>
                            <div class="card-body">
                                <p>Segera lakukan konfirmasi setelah Anda melakukan pembayaran. Klik <a href="{{route('confirmation')}}">disini</a> untuk melakukan konfirmasi melalui halaman konfirmasi.</p>
                                <p><i>Pembayaran yang tidak dikonfirmasi tidak akan diproses!</i></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col">
                    {{-- <a href="{{ route('prints.invoice', $task->id) }}" class="btn btn-secondary"><i class="fa fa-print"></i> Cetak</a> --}}
                    @if ($task->status_id == 1)
                        <button type="button" class="btn btn-danger btn-show" data-id="{{ $task->id }}" data-payment="{{$task->payment['total']}}" data-toggle="modal" data-target=".bs-example-modal-lg">Batalkan Permintaan</button>
                    @endif
                    <a href="{{route('user.print',$task->id)}}" target="_blank" class="btn btn-success">Print</a>
                </div>
            </div>
        @endif
    </div>

@endsection

@section('page-script')
    <script type="text/javascript">
        $(".btn-show").click(function () {
            $("#isLoading").show();
            $("#viewResults").hide();

            let self = $(this);
            let id   = self.data('id');
            let total= self.data('payment');
            let url  = document.head.querySelector('meta[name="app-url"]').content;
            let url_form = url+'/abort/'+id;

            axios.get(`${url}/get-task/${id}`).then(function (response) {
                let data = response.data

                $("#charge").val(data.charge[0].qty);
                total_refund = data.task_qty - data.charge[0].qty;
                $("#jumlah").val(data.task_qty);
                $("#total_refund").val(total_refund);
                $("#url_form").attr("action",url_form);


                $("#isLoading").hide();
                $("#viewResults").show();
            }).catch((error) => {
                console.log(error);
            });
            $('#method').on('change', function () {
              if ($(this).val() == "tunai") {
                $("#norek").val('');
                $("#nomor_rekening").hide();
              }else if ($(this).val() == "transfer") {
                $("#nomor_rekening").show();
              }

            });
        });


    </script>
@endsection

@section('modal')
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Refund</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="isLoading" class="text-center">
                        <i class="fa fa-spinner fa-spin fa-5x fa-fw"></i><br />
                        <p>Menggambil data dari server...</p>
                    </div>
                    <div id="viewResults" style="display:none">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="" action="tes" method="post" id="url_form">
                                  {{ csrf_field() }}
                                  {{ method_field('PUT') }}
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Metode Refund</label>
                                    <select class="form-control" name="method" id="method" required>
                                      <option value="" selected disabled>Pilih Metode</option>
                                      <option value="tunai">Tunai</option>
                                      <option value="transfer">Transfer</option>
                                    </select>
                                  </div>
                                  <div class="form-group" id="nomor_rekening" style="display:none">
                                    <label for="exampleInputPassword1">Nomor Rekening</label>
                                    <input type="text" class="form-control" name="norek" id="norek" placeholder="Nomor Rekening">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Jumlah</label>
                                    <input type="text" class="form-control" name="jumlah" id="jumlah" readonly>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Charge</label>
                                    <input type="text" class="form-control" name="charge" id="charge" readonly>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Total Refund</label>
                                    <input type="text" class="form-control" name="total_refund" id="total_refund" readonly>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1"></label>
                                    <button class="btn btn-primary" type="submit" name="submit" id="btn_submit">Simpan</button>
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
