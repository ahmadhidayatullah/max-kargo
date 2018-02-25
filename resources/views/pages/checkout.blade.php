@extends('layouts.page')

@section('content')
    <div class="container-fluid">
        <form action="" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <legend>Informasi Paket</legend>
            <div class="row">
                <div class="col col-md-6">
                    <div class="form-group row">
                        <label for="input1" class="col-sm-3 col-form-label">Nama Pengirim</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-plaintext" id="input1" name="sender_name" value="{{ $data['sender']['name'] }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input2" class="col-sm-3 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-9">
                            <input type="tel" class="form-control-plaintext" id="input2" name="sender_phone" value="{{ $data['sender']['phone'] }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input3" class="col-sm-3 col-form-label">Email Pengirim</label>
                        <div class="col-sm-9">
                            <input type="tel" class="form-control-plaintext" id="input3" name="sender_email" value="{{ $data['sender']['email'] }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input4" class="col-sm-3 col-form-label">Alamat Pengirim</label>
                        <div class="col-sm-9">
                            <textarea name="sender_address" rows="3" class="form-control-plaintext" id="input4" readonly >{{ $data['sender']['address'] }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col col-md-6">
                    <div class="form-group row">
                        <label for="input5" class="col-sm-3 col-form-label">Nama Penerima</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-plaintext" id="input5" name="to_name" value="{{ $data['to']['name'] }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input6" class="col-sm-3 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-9">
                            <input type="tel" class="form-control-plaintext" id="input6" name="to_phone" value="{{ $data['to']['phone'] }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input7" class="col-sm-3 col-form-label">Email Penerima</label>
                        <div class="col-sm-9">
                            <input type="tel" class="form-control-plaintext" id="input7" name="to_email" value="{{ $data['to']['email'] }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input8" class="col-sm-3 col-form-label">Alamat Penerima</label>
                        <div class="col-sm-9">
                            <textarea name="to_address" rows="3" class="form-control-plaintext" id="input8" readonly>{{ $data['to']['address'] }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <legend>Destinasi</legend>
            <div class="row">
                <div class="col col-md-6">
                    <div class="form-group row">
                        <label for="input9" class="col-sm-3 col-form-label">Kota Asal</label>
                        <div class="col-sm-9">
                            <select id="input9" class="form-control" name="origin_id">
                                <option value="">--Pilih Kota Asal--</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="col col-md-6">
                    <div class="form-group row">
                        <label for="input10" class="col-sm-3 col-form-label">Kota Tujuan</label>
                        <div class="col-sm-9">
                            <select id="input10" class="form-control" name="destination_id">
                                <option value="">--Pilih Kota Tujuan--</option>

                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <legend>Informasi Detail Paket</legend>
            <div class="row">
                <div class="col col-md-6">
                    <div class="form-group row">
                        <label for="input11" class="col-sm-3 col-form-label">Jenis Barang</label>
                        <div class="col-sm-9">
                            <select id="input11" class="form-control" name="commodity_id">
                                <option value="">--Pilih Jenis Barang--</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input12" class="col-sm-3 col-form-label">Surat Bebas Karantina</label>
                        <div class="col-sm-9">
                            <input type="file" id="input12" class="form-control" name="letters" multiple required>
                        </div>
                    </div>
                </div>
                <div class="col col-md-6">
                    <div class="form-group row">
                        <label for="input13" class="col-sm-3 col-form-label">Berat Barang</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" id="input13" class="form-control" placeholder="Berat Barang" aria-label="Berat Barang" aria-describedby="basic-addon2" name="weight">
                                <span class="input-group-addon" id="basic-addon2">Kg</span>
                            </div>
                        </div>
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
