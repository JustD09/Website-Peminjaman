@extends('layouts.app')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Berkas Nasabah</h4>
                <p class="card-description"></p>
                <form action="{{ route('pegawaiPengajuan.store') }}" method="POST" enctype="multipart/form-data"
                    class="forms-sample">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Nasabah</label>
                        <input name="nama_nasabah" type="text" class="form-control" id="nama" placeholder="Nama Nasabah">
                    </div>
                    <div class="form-group">
                        <label for="kelengkapan_tunjangan">Kelengkapan Tunjangan Keluarga</label>
                        <select name="kelengkapan_tunjangan" type="text" class="form-control" id="kelengkapan_tunjangan" placeholder="Kelengkapan Tunjangan Keluarga">
                            <option>Rendah</option>
                            <option>Sedang</option>
                            <option>Tinggi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggungan">Tanggungan</label>
                        <select name="tanggungan" type="text" class="form-control" id="tanggungan" placeholder="Tanggungan">
                            <option>Rendah</option>
                            <option>Sedang</option>
                            <option>Tinggi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan Pasangan</label>
                        <select name="pekerjaan" type="text" class="form-control" id="pekerjaan" placeholder="Pekerjaan Pasangan">
                            <option>Rendah</option>
                            <option>Sedang</option>
                            <option>Tinggi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="total_potongan">Total Semua Potongan</label>
                        <select name="total_potongan" type="text" class="form-control" id="total_potongan" placeholder="Total Semua Potongan">
                            <option>Rendah</option>
                            <option>Sedang</option>
                            <option>Tinggi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="total_tunjangan">Total Semua Tunjangan Kerja</label>
                        <select name="total_tunjangan" type="text" class="form-control" id="total_tunjangan" placeholder="Total Semua Tunjangan Kerja">
                            <option>Rendah</option>
                            <option>Sedang</option>
                            <option>Tinggi</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-rounded btn-fw text-center"><i class="ti-plus">Buat Data</i></button>
                </form>
            </div>
        </div>
    </div>
@endsection
