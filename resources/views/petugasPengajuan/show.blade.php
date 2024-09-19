@extends('partials.app')

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
                            value="{{ $petugasPengajuan->nama_nasabah }}">
                    </div>
                    <div class="form-group">
                        <label for="kelengkapan_tunjangan">Kelengkapan Tunjangan Keluarga</label>
                        <input name="kelengkapan_tunjangan" type="text" class="form-control" id="kelengkapan_tunjangan"
                            disabled value="{{ $petugasPengajuan->kelengkapan_tunjangan }}">
                    </div>
                    <div class="form-group">
                        <label for="tanggungan">Tanggungan</label>
                        <input name="tanggungan" type="text" class="form-control" id="tanggungan" disabled
                            value="{{ $petugasPengajuan->tanggungan }}">
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan Pasangan</label>
                        <input name="pekerjaan" type="text" class="form-control" id="pekerjaan" disabled
                            value="{{ $petugasPengajuan->pekerjaan }}">
                    </div>
                    <div class="form-group">
                        <label for="total_potongan">Total Semua Potongan</label>
                        <input name="total_potongan" type="text" class="form-control" id="total_potongan" disabled
                            value="{{ $petugasPengajuan->total_potongan }}">
                    </div>
                    <div class="form-group">
                        <label for="total_tunjangan">Total Semua Tunjangan Kerja</label>
                        <input name="total_tunjangan" type="text" class="form-control" id="total_tunjangan" disabled
                            value="{{ $petugasPengajuan->total_tunjangan }}">
                    </div>
                    <div class="form-group">
                        <label for="hasil">Hasil</label>
                        <input name="hasil" type="text" class="form-control" id="kelas_jalan" disabled
                            value="{{ $petugasPengajuan->hasil }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input name="status" type="text" class="form-control" id="status" disabled
                            value="{{ $petugasPengajuan->status }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
