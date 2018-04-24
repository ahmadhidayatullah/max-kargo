@extends('layouts.page')

@section('content')
    <div class="container-fluid">
        <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <legend>Destinasi</legend>
            <div class="row">
                <div class="col col-md-6">
                    <div class="form-group row">
                        <label for="input1" class="col-sm-3 col-form-label">Kota Asal</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-plaintext" id="input1" value="{{ $data['origin']['name'] }}" readonly>
                            <input type="hidden" name="origin_id" value="{{ $data['origin']['id'] }}">
                        </div>
                    </div>
                </div>
                <div class="col col-md-6">
                    <div class="form-group row">
                        <label for="input2" class="col-sm-3 col-form-label">Kota Tujuan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-plaintext" id="input2" value="{{ $data['destination']['name'] }}" readonly>
                            <input type="hidden" name="destination_id" value="{{ $data['destination']['id'] }}">
                        </div>
                    </div>
                </div>
            </div>
            <legend>Tarif</legend>
            <div class="container">
                <div class="row">
                    <table class="table table-responisve table-bordered table">
                        <thead>
                            <tr>
                                <th>Minimal</th>
                                <th>Nominal</th>
                                <th>+45</th>
                                <th>+100</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ toRupiah($data['cost']['price']['minimal']) }}</td>
                                <td>{{ toRupiah($data['cost']['price']['nominal']) }}</td>
                                <td>{{ toRupiah($data['cost']['price']['plus_45']) }}</td>
                                <td>{{ toRupiah($data['cost']['price']['plus_100']) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <ul class="list-unstyled">
                        <li><small>* Jika pengiriman dengan berat di dibawah 10 Kg di kenakan tarif minimal.</small></li>
                        <li><small>* Jika pengiriman dengan berat di diatas 10 Kg di kenakan tarif nominal.</small></li>
                        <li><small>* Jika pengiriman dengan berat di diatas 45 Kg di kenakan tarif +45.</small></li>
                        <li><small>* Jika pengiriman dengan berat di diatas 100 Kg di kenakan tarif +100.</small></li>
                    </ul>
                </div>
            </div>
            <legend>Informasi Detail Paket</legend>
            <div class="row">
                <div class="col col-md-6">
                    <div class="form-group row">
                        <label for="input3" class="col-sm-3 col-form-label">Jenis Barang</label>
                        <div class="col-sm-9">
                            {{-- <select id="input3" class="form-control" name="commodity_id" required>
                                <option value="">--Pilih Jenis Barang--</option>
                                @foreach ($options['commodities'] as $option)
                                    <option value="{{ $option->id }}">{{ $option->code }} {{ $option->name }}</option>
                                @endforeach
                            </select> --}}
                            <input type="text" class="form-control" id="input11" value="{{$data['commodity']['name']}}" name="commodity_name" required readonly>
                            <input type="hidden" class="form-control" id="input11" value="{{$data['commodity']['id']}}" name="commodity_id" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input4" class="col-sm-3 col-form-label">Surat Bebas Karantina</label>
                        <div class="col-sm-9">
                            <input type="file" id="input4" class="form-control" name="letters[]" multiple required>
                        </div>
                    </div>
                </div>
                <div class="col col-md-6">
                    <div class="form-group row">
                        <label for="input5" class="col-sm-3 col-form-label">Berat Barang</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" id="input5" class="form-control" aria-label="Berat Barang" aria-describedby="basic-addon2" name="weight" value="{{ $data['weight'] }}">
                                <span class="input-group-addon" id="basic-addon2">Kg</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input6" class="col-sm-3 col-form-label">Metode Pembayaran</label>
                        <div class="col-sm-9">
                            {{-- <select id="input6" class="form-control" name="payment_method">
                                <option value="">-- Pilih Metode Pembayaran --</option> --}}
                                {{-- <option value="TUNAI">TUNAI</option>
                                <option value="BANK XYZ">BANK XYZ</option> --}}
                                {{-- @foreach ($options['payment_methods'] as $option)
                            <option value="{{ $option->id }}">{{ $option->display_name }}</option>
                                @endforeach
                            </select>--}}
                            @foreach ($options['payment_methods'] as $option) 
                                <div class="radio"
                                    <label><input type="radio" name="payment_method[]" value="{{ $option->id }}">{{$option->display_name}}</label>
                                    @if ($option->name != 'cash')
                                    <img src="{{url('img/bni.jpg')}}" style="width: 50px">
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label for="inpu6" class="col-sm-3 col-form-label">Total</label>
                        <div class="col-sm-9">
                            <input type="text" id="input6" class="form-control-plaintext" value="{{ toRupiah($data['payment']['total']) }}" readonly>
                        </div>
                    </div> --}}
                </div>
            </div>

            <legend>Informasi Pengirim dan Penerima</legend>
            <div class="row">
                <div class="col col-md-6">
                    <div class="form-group row">
                        <label for="input7" class="col-sm-3 col-form-label">Nama Pengirim</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input7" name="sender_name" placeholder="Nama Pengirim" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input8" class="col-sm-3 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon">+62</span>
                                <input type="number" class="form-control" id="input8" name="sender_phone" placeholder="Nomor Telepon" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input9" class="col-sm-3 col-form-label">Email Pengirim</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="input9" name="sender_email" placeholder="Email Pengirim" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input10" class="col-sm-3 col-form-label">Alamat Pengirim</label>
                        <div class="col-sm-9">
                            <textarea name="sender_address" rows="3" class="form-control" id="input10" placeholder="Alamat Pengirim" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="col col-md-6">
                    <div class="form-group row">
                        <label for="input11" class="col-sm-3 col-form-label">Nama Penerima</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="input11" name="to_name" placeholder="Nama Penerima" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input12" class="col-sm-3 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon">+62</span>
                                <input type="number" class="form-control" id="input12" name="to_phone" placeholder="Nomor Telepon" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input13" class="col-sm-3 col-form-label">Email Penerima</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="input13" name="to_email" placeholder="Email Penerima" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input14" class="col-sm-3 col-form-label">Alamat Penerima</label>
                        <div class="col-sm-9">
                            <textarea name="to_address" rows="3" class="form-control" id="input14" placeholder="Alamat Penerima" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="{{ route('index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Kirim Permintaan</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('page-script')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#input6").change(function() {

            });
        });
    </script>
@endsection
