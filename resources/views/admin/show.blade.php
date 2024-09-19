@extends('components.app')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Berkas Nasabah</h4>
                <p class="card-description"></p>
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="nama">Nama Nasabah</label>
                        <input name="nama" type="text" class="form-control" id="nama" disabled
                            value="{{ $admin->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="slip_gaji">Slip Gaji</label>
                        <img name="slip_gaji" class="form-control" id="slip_gaji_image"
                            src="{{ asset('slip_gaji/' . $admin->slip_gaji) }}" alt="Slip Gaji" width="100">
                    </div>
                    <div class="form-group">
                        <label for="data_riwayat">Surat Data Riwayat</label>
                        <img name="data_riwayat" class="form-control" id="data_riwayat_image"
                            src="{{ asset('data_riwayat/' . $admin->data_riwayat) }}" alt="Surat Data Riwayat"
                            width="100">
                    </div>
                    <div class="form-group">
                        <label for="rincian_gaji">Rincian Gaji</label>
                        <img name="rincian_gaji" class="form-control" id="rincian_gaji_image"
                            src="{{ asset('rincian_gaji/' . $admin->rincian_gaji) }}" alt="Rincian Gaji" width="100">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
