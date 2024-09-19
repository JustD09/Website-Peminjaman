@extends('partials.app')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Berkas Nasabah</h4>
                <p class="card-description"></p>
                <form action="{{ route('petugasPengajuan.update', $petugasPengajuan->id) }}" method="POST" enctype="multipart/form-data"
                    class="forms-sample">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Nasabah</label>
                        <input name="nama_nasabah" type="text" class="form-control" id="nama"
                            value="{{ $petugasPengajuan->nama_nasabah }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="kelengkapan_tunjangan">Kelengkapan Tunjangan Keluarga</label>
                        <select name="kelengkapan_tunjangan" type="text" class="form-control" id="kelengkapan_tunjangan" value="{{ $petugasPengajuan->kelengkapan_tunjangan }}" readonly>
                            <option>Rendah</option>
                            <option>Sedang</option>
                            <option>Tinggi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggungan">Tanggungan</label>
                        <select name="tanggungan" type="text" class="form-control" id="tanggungan" value="{{ $petugasPengajuan->tanggungan }}" readonly>
                            <option>Rendah</option>
                            <option>Sedang</option>
                            <option>Tinggi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan Pasangan</label>
                        <select name="pekerjaan" type="text" class="form-control" id="pekerjaan" value="{{ $petugasPengajuan->pekerjaan }}" readonly>
                            <option>Rendah</option>
                            <option>Sedang</option>
                            <option>Tinggi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="total_potongan">Total Semua Potongan</label>
                        <select name="total_potongan" type="text" class="form-control" id="total_potongan" value="{{ $petugasPengajuan->total_potongan }}" readonly>
                            <option>Rendah</option>
                            <option>Sedang</option>
                            <option>Tinggi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="total_tunjangan">Total Semua Tunjangan Kerja</label>
                        <select name="total_tunjangan" type="text" class="form-control" id="total_tunjangan" value="{{ $petugasPengajuan->total_tunjangan }}" readonly>
                            <option>Rendah</option>
                            <option>Sedang</option>
                            <option>Tinggi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" type="text" class="form-control" id="status" value="{{ $petugasPengajuan->status }}">
                            <option>Setuju</option>
                            <option>Tidak Setuju</option>
                        </select>
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
