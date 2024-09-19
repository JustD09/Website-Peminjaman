@extends('partials.app')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Berkas Nasabah</h4>
                <p class="card-description"></p>
                <form action="{{ route('petugas.update', $petugas->id) }}" method="POST" enctype="multipart/form-data"
                    class="forms-sample">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Nasabah</label>
                        <input name="nama" type="text" class="form-control" id="nama"
                            value="{{ $petugas->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="kelengkapan_tunjangan">Kelengkapan Tunjangan Keluarga</label>
                        <input name="kelengkapan_tunjangan" type="text" class="form-control" id="kelengkapan_tunjangan"
                            value="{{ $petugas->kelengkapan_tunjangan }}">
                    </div>
                    <div class="form-group">
                        <label for="tanggungan">Tanggungan</label>
                        <input name="tanggungan" type="text" class="form-control" id="tanggungan"
                            value="{{ $petugas->tanggungan }}">
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan Pasangan</label>
                        <input name="pekerjaan" type="text" class="form-control" id="pekerjaan"
                            value="{{ $petugas->pekerjaan }}">
                    </div>
                    <div class="form-group">
                        <label for="total_potongan">Total Semua Potongan</label>
                        <input name="total_potongan" type="text" class="form-control" id="total_potongan"
                            value="{{ $petugas->total_potongan }}">
                    </div>
                    <div class="form-group">
                        <label for="total_tunjangan">Total Semua Tunjangan Kerja</label>
                        <input name="total_tunjangan" type="text" class="form-control" id="total_tunjangan"
                            value="{{ $petugas->total_tunjangan }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-select" id="status" value="{{ $petugas->status }}">
                            <option>Setuju</option>
                            <option>Tidak Setuju</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-rounded btn-fw"><i class="ti-plus">Simpan
                            Perubahan</i></button>
                </form>
            </div>
        </div>
    </div>
@endsection
