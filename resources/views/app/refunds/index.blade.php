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
                            </div>

                            <div class="fresh-datatables table-responsive">
    										        <table id="datatables" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                										<thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>Nomor Order</th>
                                            <th>Nama</th>
                                            <th>Metode</th>
                                            <th>Nomor Rekening</th>
                                            <th>Refund</th>
                                            <th>Charge</th>
                                            <th>Ket.</th>
                                        </tr>
                										</thead>
            										    <tbody>
                                        @foreach ($refunds as $refund => $value)
                                            <tr>
                                                <td>{{ $refund +1 }}</td>
                                                <td>{{ $value->task->order_number }}</td>
                                                <td>{{ $value->task->sender['name'] }}</td>
                                                <td>{{ $value->method }}</td>
                                                <td>{{ ($value->method == 'transfer') ? $value->nomor_rekening : '-' }}</td>
                                                <td>{{ $value->task->payment['total'] }}</td>
                                                <td>{{ $value->charge }}</td>
                                                <td>
                                                  @if ($value->is_refund == 0)
                                                    <form action="{{route('refunds.update',$value->id)}}" method="post" style="display:inline">
                                                      {{ csrf_field() }}
                                                      {{method_field('PUT')}}
                                                      <input type="hidden" name="is_refund" value="1">
                                                      <button type="button" class="btn btn-danger btn-fill btn-sm btn-confirm">Belum kembali</button>
                                                    </form>
                                                  @elseif ($value->is_refund == 1)
                                                    <form action="{{route('refunds.update',$value->id)}}" method="post" style="display:inline">
                                                      {{ csrf_field() }}
                                                      {{method_field('PUT')}}
                                                      <input type="hidden" name="is_refund" value="0">
                                                      <button type="button" class="btn btn-success btn-fill btn-sm btn-confirm">Sudah Kembali</button>
                                                    </form>
                                                  @else
                                                    Status tidak sesuai
                                                  @endif
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

        $(".btn-confirm").click(function () {
            swal({
                title: 'Apakah kamu yakin untuk mengubah status refund ?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success btn-fill',
                cancelButtonClass: 'btn btn-danger btn-fill',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                buttonsStyling: false
            }).then(() => {
                $(this).parent().submit();
            });
        });
    </script>
@endsection
