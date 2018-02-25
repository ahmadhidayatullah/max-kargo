@extends('layouts.app')

@section('content')
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
                            </div>

                            <div class="fresh-datatables table-responsive">
    										        <table id="datatables" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                										<thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>Code</th>
                                            <th width="150">Nama</th>
                                            <th>Provinsi</th>
                                        </tr>
                										</thead>
            										    <tbody>
                                        @foreach ($origins as $origin)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $origin->code }}</td>
                                                <td>{{ $origin->name }}</td>
                                                <td>{{ $origin->province }}</td>
                                            </tr>
                                        @endforeach
            										    </tbody>
    									           </table>
									           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_script')
    <script type="text/javascript">
        $('#datatables').DataTable();

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
