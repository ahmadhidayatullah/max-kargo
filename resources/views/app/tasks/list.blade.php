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
                                <a href="{{route('orders.print')}}" target="_blank" class="btn btn-default"><i class="ti-printer"></i> Print</a><br><br>
                            </div>

                            <div class="fresh-datatables table-responsive">
    										        <table id="datatables" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                										<thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>Nomor Resi</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Email</th>
                                            <th>Telp</th>
                                            <th>Jenis Barang</th>
                                            <th>Berat Barang</th>
                                            <th>Biaya</th>
                                        </tr>
                										</thead>
            										    <tbody>
                                        @foreach ($tasks as $task)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $task->order_number }}</td>
                                                <td>{{ $task->sender['name'] }}</td>
                                                <td>{{ $task->sender['address'] }}</td>
                                                <td>{{ $task->sender['email'] }}</td>
                                                <td>{{ $task->sender['phone'] }}</td>
                                                <td>{{ $task->commodity->name }}</td>
                                                <td>{{ $task->weight }} Kg</td>
                                                <td>{{ toRupiah($task->payment['total']) }}</td>
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
            "scrollX": true,
            "pagingType": "full_numbers",
            "responsive": true,
            "language": {
                "search": "_INPUT_",
                "searchPlaceholder": "Cari Data",
            },
            "columnDefs": [
                { "className": "text-center", "targets": "_all" }
            ]
        });

    </script>
@endsection
