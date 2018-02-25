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
                              <button type="button" style="margin-bottom:10px" class="btn btn-info btn-create" name="button" data-toggle="modal" data-target=".bs-example-modal-lg"> <i class="ti-plus"></i> Add Cost</button>

                          </div>

                            <div class="fresh-datatables table-responsive">
    										        <table id="datatables" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                										<thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>Commodity</th>
                                            <th>From</th>
                                            <th>TO</th>
                                            <th>Minimal (Rp)</th>
                                            <th>Nominal (Rp)</th>
                                            <th>+45 (Rp)</th>
                                            <th>+100 (Rp)</th>
                                            <th width="200">Aksi</th>
                                        </tr>
                										</thead>
            										    <tbody>
                                        @foreach ($costs as $cost)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $cost->commodity->name }}</td>
                                                <td>{{ $cost->origin->name }}</td>
                                                <td>{{ $cost->destination->name }}</td>
                                                <td>{{ $cost->price['minimal'] }}</td>
                                                <td>{{ $cost->price['nominal'] }}</td>
                                                <td>{{ $cost->price['plus_45'] }}</td>
                                                <td>{{ $cost->price['plus_100'] }}</td>
                                                <td>
                                                  <button type="button" class="btn btn-info btn-sm btn-show" data-id="{{ $cost->id }}" data-toggle="modal" data-target=".bs-example-modal-lg">Edit</button>
                                                  <form action="{{ route('costs.destroy', $cost->id) }}" method="post" style="display:inline">
                                                      {{ csrf_field() }}
                                                      {{ method_field('DELETE') }}
                                                      <button type="button" class="btn btn-danger btn-sm btn-delete">Hapus</button>
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
      $('#datatables').DataTable();

      $(".btn-delete").click(function () {
          swal({
              title: 'Apakah kamu yakin untuk menghapus data ini ?',
              type: 'warning',
              showCancelButton: true,
              confirmButtonClass: 'btn btn-success btn-fill',
              cancelButtonClass: 'btn btn-danger btn-fill',
              confirmButtonText: 'Ya',
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
          let url_form = url+'/app/master/cost/'+id;

          axios.get(`${url}/app/master/cost/${id}`).then(function (response) {
              let cost = response.data
              let i = 1

              var commodity_id = $('#commodity_id');
              commodity_id.empty();
              $.each(cost.commodity, function(key, value) {
                if (value.id == cost.cost[0].commodity.id) {
                  commodity_id.append("<option value='"+ value.id +"' selected>" + value.name + "</option>");
                }else {
                  commodity_id.append("<option value='"+ value.id +"'>" + value.name + "</option>");
                }
              });

              var destination_id = $('#destination_id');
              destination_id.empty();
              $.each(cost.destination, function(key, value) {
                if (value.id == cost.cost[0].destination.id) {
                  destination_id.append("<option value='"+ value.id +"' selected>" + value.name + ', ' + value.province + "</option>");
                }else {
                  destination_id.append("<option value='"+ value.id +"'>" + value.name + ', ' + value.province + "</option>");
                }
              });

              var origin_id = $('#origin_id');
              origin_id.empty();
              $.each(cost.origin, function(key, value) {
                if (value.id == cost.cost[0].origin.id) {
                  origin_id.append("<option value='"+ value.id +"' selected>" + value.name + "</option>");
                }else {
                  origin_id.append("<option value='"+ value.id +"'>" + value.name + "</option>");
                }
              });

              $("#minimal").val(cost.cost[0].price.minimal);
              $("#nominal").val(cost.cost[0].price.nominal);
              $("#plus_45").val(cost.cost[0].price.plus_45);
              $("#plus_100").val(cost.cost[0].price.plus_100);

              $("#url_form").attr("action",url_form);


              $("#isLoading").hide();
              $("#viewResults").show();
          }).catch((error) => {
              console.log(error);
          });
      });

      $(".btn-create").click(function () {
        $("#isLoading").hide();
        $("#viewResults").show();
          let url  = document.head.querySelector('meta[name="app-url"]').content;
          let url_form = url+'/app/master/cost/store/data';
          $("#url_form").attr("action",url_form);
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
                            <div class="col-md-12">
                                <form class="" action="tes" method="post" id="url_form">
                                  {{ csrf_field() }}
                                  {{-- {{ method_field('PUT') }} --}}
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Comodity</label>
                                    <select class="form-control" id="commodity_id" name="commodity_id" required>
                                      <option value="">-- Pilih Comodity --</option>
                                      @foreach ($commodities as $commodity)
                                        <option value="{{$commodity->id}}">{{$commodity->name}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">From</label>
                                    <select class="form-control" id="origin_id" name="origin_id" required>
                                      <option value="">-- Pilih From --</option>
                                      @foreach ($origins as $origin)
                                        <option value="{{$origin->id}}">{{$origin->name.', '.$origin->province}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Destination</label>
                                    <select class="form-control" id="destination_id" name="destination_id" required>
                                      <option value="">-- Pilih Destionation --</option>
                                      @foreach ($destinations as $destination)
                                        <option value="{{$destination->id}}">{{$destination->name.', '.$destination->province}}</option>
                                      @endforeach
                                    </select>
                                  </div>

                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Minimal (Rp)</label>
                                    <input type="number" class="form-control" name="minimal" id="minimal" placeholder="Minimal" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Nominal (Rp)</label>
                                    <input type="number" class="form-control" name="nominal" id="nominal" placeholder="Nominal" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">+45 kg (Rp)</label>
                                    <input type="number" class="form-control" name="plus_45" id="plus_45" placeholder="" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">+100 kg (Rp)</label>
                                    <input type="number" class="form-control" name="plus_100" id="plus_100" placeholder="" required>
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
