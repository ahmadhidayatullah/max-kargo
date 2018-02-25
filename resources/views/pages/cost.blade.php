@extends('layouts.page')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <p class="display-4 text-center">Daftar Tarif</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p><strong>Keterangan</strong></p>
                <ul class="list-unstyled">
                    <li><small>* Jika pengiriman dengan berat di dibawah 10 Kg di kenakan tarif minimal.</small></li>
                    <li><small>* Jika pengiriman dengan berat di diatas 10 Kg di kenakan tarif nominal.</small></li>
                    <li><small>* Jika pengiriman dengan berat di diatas 45 Kg di kenakan tarif +45.</small></li>
                    <li><small>* Jika pengiriman dengan berat di diatas 100 Kg di kenakan tarif +100.</small></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-12">
              <table id="datatables2" class="table table-striped table-hover" cellspacing="0" width="100%" style="width:100%">
                <thead>
                  <tr>
                    <th>No. </th>
                    <th>Commodity</th>

                    <th>Kota Tujuan</th>
                    <th>Minimal (Rp)</th>
                    <th>Nominal (Rp)</th>
                    <th>+45 Kg </th>
                    <th>+100 Kg </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($costs as $cost)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $cost->commodity->name }}</td>
                      
                      <td>{{ $cost->destination->name }}</td>
                      <td>{{ toRupiah($cost->price['minimal']) }}</td>
                      <td>{{ toRupiah($cost->price['nominal']) }}</td>
                      <td>{{ toRupiah($cost->price['plus_45']) }}</td>
                      <td>{{ toRupiah($cost->price['plus_100']) }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>

@endsection
@section('page-script')
  {{-- <script src="{{ asset('js/jquery.datatables.js') }}"></script>
  <script type="text/javascript">
    $('#datatables2').DataTable();
  </script> --}}
@endsection
