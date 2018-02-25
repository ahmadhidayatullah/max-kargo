@extends('layouts.page')

@section('content')
    <div class="container-fluid">
        <form action="{{ route('index2') }}" method="post">
            {{ csrf_field() }}
            <legend>Destinasi</legend>
            <div class="row">
                <div class="col col-md-4">
                    <div class="form-group">
                        <select id="origin_id" class="form-control" name="origin_id" readonly>
                            <option value="">--Pilih Kota Asal--</option>
                            @foreach ($options['origins'] as $option)
                                <option value="{{ $option->id }}" {{ ($option->id == 1) ? 'selected' : '' }}>{{ $option->name }}, {{ $option->province }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col col-md-4">
                    <div class="form-group">
                        <select id="destination_id" class="form-control" name="destination_id" required>
                            <option value="">--Pilih Kota Tujuan--</option>
                            @foreach ($options['destinations'] as $option)
                                <option value="{{ $option->id }}">{{ $option->name }}, {{ $option->province }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col col-md-4">
                    <div class="form-group">
                        <select id="commodity_id" class="form-control" name="commodity_id" required>
                            <option value="">--Pilih Commodity--</option>
                            {{-- @foreach ($options['commodities'] as $option)
                                <option value="{{ $option->id }}">{{ $option->name }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Selanjutnya</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('ajax')
  <script type="text/javascript">

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#destination_id').on('change', function () {
    $.ajax({
      url       : "{{route('get_commodities')}}",
      dataTy    : 'json',
      type      : 'POST',
      data      : {
        'destination_id': $('#destination_id').val(),
        'origin_id'     : $('#origin_id').val()
      },
      success : function(data) {
        if (data != 'kosong') {
          var commodity_id = $('#commodity_id');
          commodity_id.empty();
          $.each(data, function(key, value) {
            commodity_id.append("<option value='"+ value.commodity.id +"'>" + value.commodity.name + "</option>");
          });
        }else {
          $('#commodity_id').html("<option value=''>-- Commodity Belum Ada --</option>");
        }
        // console.log(data)
      },
      error: function (data) {
        console.log('Error:', data);
      }
    });
  });

  </script>
@endsection
