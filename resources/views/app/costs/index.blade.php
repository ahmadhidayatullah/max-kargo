@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title">{{ $title }}</h4>

                    <br>

                    <div class="card">
                        <div class="card-content">
                            <div class="toolbar">
                                <!--Here you can write extra buttons/actions for the toolbar-->
                            </div>

                            <div class="fresh-datatables">
            										<table id="datatables" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                										<thead>
                  											<tr>
                    												<th>Origin</th>
                    												<th>Destination</th>
                    												<th colspan="4">Rate(IDR/Kg) & Weight Break(Kg)</th>
                    												<th>Base Rate</th>
                  											</tr>
                                        <tr>
                                            <th class="disabled-sorting">Code</th>
                                            <th>Code</th>
                                            <th>Minimal</th>
                                            <th>Nominal</th>
                                            <th>+45</th>
                                            <th>+100</th>
                                            <th>%</th>
                                        </tr>
                										</thead>
            										    <tbody>

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
        $(document).ready(function () {
            $('#datatables').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": '{!! route('datatables.costs') !!}',
                "columns": [
                    { data: 'origin.code', orderable: false },
                    { data: 'destination.code', orderable: false },
                    { data: 'price.minimal', orderable: false },
                    { data: 'price.nominal', orderable: false },
                    { data: 'price.plus_45', orderable: false },
                    { data: 'price.plus_100', orderable: false },
                    { data: 'base_rate', orderable: false }
                ],
                "columnDefs": [
                    { "className": "text-center", "targets": "_all" }
                ],
                "searching": false,
                "pagingType": "full_numbers",
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "responsive": true
            });
        });
    </script>
@endsection
