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
                            @if(session('message'))
                            {!!session('message')!!}
                            @endif
                            @if($errors->any())
                            <div class="alert alert-danger alert-dismissable">
                                <strong>Failed!</strong>
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </div>
                            @endif
                            <!--Here you can write extra buttons/actions for the toolbar-->
                        </div>
                        
                        <div class="fresh-datatables table-responsive">
                            <table id="datatables" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Nomor Resi</th>
                                        <th>Nama</th>
                                        <th width="150">Alamat</th>
                                        <th width="150">Jenis Barang</th>
                                        <th width="150">Konfirmasi</th>
                                        <th width="200">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $task->order_number }}</td>
                                        <td>{{ $task->sender['name'] }}</td>
                                        <td>{{ $task->sender['address'] }}</td>
                                        <td>{{ $task->commodity->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm btn-input" data-id="{{ $task->id }}" data-toggle="modal" data-target=".bs-example-modal-lg-2">Input Berat</button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-sm btn-show" data-id="{{ $task->id }}" data-toggle="modal" data-target=".bs-example-modal-lg">Lihat</button>
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
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "responsive": true,
            "language": {
                "search": "_INPUT_",
                "searchPlaceholder": "Cari Data",
            },
            "columnDefs": [
            { "orderable": false, "searchable": false, "targets": 0 },
            { "orderable": false, "searchable": false, "targets": 5 },
            { "orderable": false, "searchable": false, "targets": 6 },
            { "className": "text-center", "targets": "_all" }
            ]
        });
        
        $(".btn-show").click(function () {
            $("#isLoading").show();
            $("#viewResults").hide();
            
            let self = $(this);
            let id   = self.data('id');
            let url = document.head.querySelector('meta[name="app-url"]').content;
            
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
                $("#estimate").text(task.cost.destination.estimate);
                
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
        
        $(".btn-print").click(function () {
            let self = $(this);
            let id = self.data('id');
            let url = document.head.querySelector('meta[name="app-url"]').content;
            self.attr("href", `${url}/prints/invoice/${id}`);
        });

        $(".btn-input").click(function () {
            let self = $(this);
            let id = self.data('id');
            let url = document.head.querySelector('meta[name="app-url"]').content;
            let url_form = url+'/app/tasks/'+id;
            console.log(id)
            $("#id_number").val(id);
            $("#url_form").attr("action",url_form);
            
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
                <h4 class="modal-title" id="myModalLabel">
                    <i class="fa fa-truck"></i> MAX KARGO
                    <small class="float-right"></small>
                </h4>
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
                            <h4 class="">Kode Resi: <strong id="order_number"></strong></h4>
                            <p>
                                Kota Asal: <span id="origin"></span> <br />
                                Kota Tujuan: <span id="destination"></span><br />
                                Estimasi: <span id="estimate"></span>
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
                                        <th scope="row">Administrasi</th>
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
            <div class="modal-footer">
                <a href="javascript:void(0)" target="_blank" class="btn btn-default btn-print"><i class="fa fa-print fa-fw"></i> Cetak</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-lg-2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Masukkan Berat Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="viewResults" style="">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="" action="tes" method="POST" id="url_form">
                                  {{ csrf_field() }}
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Berat Barang (Kg)</label>
                                    <input type="number" name="weight" class="form-control" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1"></label>
                                    <button class="btn btn-primary" type="submit" name="submit" id="btn_submit">Proses</button>
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
