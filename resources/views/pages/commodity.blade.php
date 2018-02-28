@extends('layouts.page')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <p class="display-4 text-center" id="simulasi-tarif">Commodity</p>
    </div>
  </div>
  <div class="row">
    <div class="col col-lg-12">
      <table id="datatables2" class="table table-striped table-hover" cellspacing="0" width="100%" style="width:100%">
        <thead>
          <tr>
            <th>No. </th>
            <th>Commodity</th>
            <th>Keterangan</th>
            
            <th>Kota Tujuan</th>
            <th>Estimasi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($costs as $cost)
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $cost->commodity->name }}</td>
            <td>{{ $cost->commodity->keterangan }}</td>
            
            <td>{{ $cost->destination->name }}</td>
            <td>{{ $cost->destination->estimate }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
@section('page-script')

@endsection
@section('ajax')

@endsection
