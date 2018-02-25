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
                                            <th>Nomor Resi</th>
                                            <th>Tanggal Transfer</th>
                                            <th>Jumlah Transfer</th>
                                            <th>Nama</th>
                                            <th>Bukti</th>
                                            <th>Aksi</th>
                                        </tr>
                										</thead>
            										    <tbody>
                                        @foreach ($confirmations as $confirmation)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $confirmation->order_number }}</td>
                                                <td>{{ $confirmation->transfer_date }}</td>
                                                <td>{{ toRupiah($confirmation->transfer_amount) }}</td>
                                                <td>{{ $confirmation->transfer_name }} </td>
                                                <td>
                                                    <a href="{{ url('file/' . $confirmation->transfer_photo) }}" target="_blank">Foto</a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('confirmations.update', $confirmation->id) }}" method="post" style="display:inline">
                                                        {{ csrf_field() }}
                                                        {{ method_field('PUT') }}

                                                        @if ($confirmation->isVerified == 0)

                                                            <input type="hidden" name="isVerified" value="1">
                                                            <button type="submit" class="btn btn-danger btn-sm">Belum Terverifikasi</button>

                                                        @elseif ($confirmation->isVerified == 1)

                                                            <input type="hidden" name="isVerified" value="0">
                                                            <button type="submit" class="btn btn-success btn-sm">Terverifikasi</button>

                                                        @endif

                                                    </form>
                                                </td>
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
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "responsive": true,
            "language": {
                "search": "_INPUT_",
                "searchPlaceholder": "Cari Data",
            },
            "columnDefs": [
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
            let url  = `http://max-kargo.test/api/tasks/${id}`;

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

            axios.get(url).then(function (response) {
                let task = response.data

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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
