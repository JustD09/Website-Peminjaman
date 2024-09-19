@extends('components.app')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Berkas Nasabah</h4>
                <p class="card-description"></p>
                <form action="{{ route('admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data"
                    class="forms-sample">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Nasabah</label>
                        <input name="nama" type="text" class="form-control" id="nama"
                            value="{{ $admin->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="slip_gaji">Slip Gaji</label>
                        <input name="slip_gaji" type="file" class="form-control" id="slip_gaji"
                            value="{{ $admin->slip_gaji }}">
                    </div>
                    <div class="form-group">
                        <label for="data_riwayat">Surat Data Riwayat</label>
                        <input name="data_riwayat" type="file" class="form-control" id="data_riwayat"
                            value="{{ $admin->data_riwayat }}">
                    </div>
                    <div class="form-group">
                        <label for="rincian_gaji">Rincian Gaji</label>
                        <input name="rincian_gaji" type="file" class="form-control" id="rincian_gaji"
                            value="{{ $admin->rincian_gaji }}">
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-warning btn-rounded btn-fw">Simpan
                                Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
