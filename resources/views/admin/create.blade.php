@extends('components.app')

@section('content')
    <div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Berkas Nasabah</h4>
            <p class="card-description"> Masukan Berkas Nasabah </p>
            <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Nasabah</label>
                    <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama Nasabah">
                </div>
                <div class="form-group">
                    <label for="slip_gaji">Slip Gaji</label>
                    <input type="file" name="slip_gaji" id="slip_gaji" class="form-control" placeholder="Slip Gaji">
                </div>
                <div class="form-group">
                    <label for="data_riwayat">Surat Data Riwayat</label>
                    <input type="file" name="data_riwayat" id="data_riwayat" class="form-control" placeholder="Surat Data Riwayat">
                </div>
                <div class="form-group">
                    <label for="rincian_gaji">Rincian Gaji</label>
                    <input type="file" name="rincian_gaji" id="rincian_gaji" class="form-control" placeholder="Rincian Gaji">
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-success btn-rounded btn-fw ">Buat Data</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection