@extends('layouts.page')

@section('content')
    <div class="container">
        @if (session('error'))
            <div class="row">
                <div class="col">
                    <div class="alert alert-danger" role="alert">
                        <h3 class="alert-heading">Opps..Ada Kesalahan.</h3>
                        <p>{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @elseif (session('ok'))
            <div class="row">
                <div class="col">
                    <div class="alert alert-success" role="alert">
                        <h3 class="alert-heading">Terima Kasih.</h3>
                        <p>{{ session('ok') }}</p>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col">
                <h1>Konfirmasi Pembayaran</h1>
                <form action="{{ route('payment') }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}

                    <legend>Data Order</legend>
                    <div class="form-group">
                        <label for="input1">Nomor Resi</label>
                        <input type="number" class="form-control" id="input1" name="order_number" placeholder="Nomor Resi" required>
                    </div>
                    <legend>Data Pembayaran</legend>
                    <div class="form-group">
                        <label for="input2">Tanggal Transfer</label>
                        <input type="date" class="form-control" id="input2" name="transfer_date" required>
                    </div>
                    <div class="form-group">
                        <label for="input3">Bank Tujuan</label>
                        <input type="text" class="form-control" id="input3" name="transfer_to" size="30" value="BANK BNI a/n Max Royzer Pakan - 0242221208" readonly>
                    </div>
                    <div class="form-group">
                        <label for="input4">Jumlah Dana</label>
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</span>
                            <input type="number" class="form-control" id="input4" name="transfer_amount" required>
                            <span class="input-group-addon">,00</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input5">Nama Pengirim</label>
                        <input type="text" class="form-control" id="input5" name="transfer_name" required>
                    </div>
                    <div class="form-group">
                        <label for="input6">Bukti Pembayaran</label>
                        <input type="file" class="form-control" id="input6" name="transfer_photo" accept="image/*" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                        <button type="reset" class="btn btn-default">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
