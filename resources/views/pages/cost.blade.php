@extends('layouts.page')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <p class="display-4 text-center" id="simulasi-tarif">Simulasi Tarif</p>
    </div>
  </div>
  <div class="row">
    <div class="col col-lag-6">
      <form action="#" method="POST">
        <div class="form-group">
          <select id="origin_id" class="form-control" name="origin_id" readonly>
            @foreach ($options['origins'] as $option)
            <option value="{{ $option->id }}" {{ ($option->id == 1) ? 'selected' : '' }}>{{ $option->name }}, {{ $option->province }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <select id="destination_id" class="form-control" name="destination_id" required>
            <option value="">--Pilih Kota Tujuan--</option>
            @foreach ($options['destinations'] as $option)
            <option value="{{ $option->id }}">{{ $option->name }}, {{ $option->province }}</option>
            @endforeach
          </select>
        </div>
        <div class="row">
          <div class="col col-lg-6">
            <div class="form-group">
              <select id="commodity_id" class="form-control" name="commodity_id" required>
                <option value="">--Pilih Commodity--</option>
                {{-- @foreach ($options['commodities'] as $option)
                <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach --}}
              </select>
            </div>
          </div>
          <div class="col col-lg-6">
            <div class="form-group">
              <input type="number" name="kg" class="form-control" required id="kg">
            </div>
          </div>
        </div>
        <a href="#simulasi-tarif" class="btn btn-primary btn-result">Selanjutnya</a>
      </form>
    </div>
    <div class="col col-lag-6">
      <h4>Hasil</h4>
      <div id="result"></div>
    </div>
  </div>
</div>

@endsection
@section('page-script')
<script type="text/javascript">
  $(".btn-result").click(function () {
    let destination_id = $('#destination_id').val();
    let origin_id      = $('#origin_id').val();
    let commodity_id   = $('#commodity_id').val();
    let kg             = $('#kg').val();
      
    let url  = document.head.querySelector('meta[name="app-url"]').content;
    
    axios.get(`${url}/cek-cost/${origin_id}/${destination_id}/${commodity_id}/${kg}`).then(function (response) {
      let data = response.data;
      console.log(data);
      $('#result').html(data);
      
    }).catch((error) => {
      console.log(error);
    });
  });
  
  
</script>
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
