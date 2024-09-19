@extends('layouts.app')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Selamat Datang Di Sistem Aplikasi Usul Pinjaman
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                </li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Total Pengajuan Peminjaman <i
                            class="mdi mdi-file-document mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5">{{ $pengajuan }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Total Berkas <i class="mdi mdi-file-import mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5">{{ $berkas }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Total User <i
                            class="mdi mdi-account-box-outline mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5">{{ $totalUser }}</h2>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Laporan Masyarakat</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> No. </th>
                                <th> Nama Pelapor </th>
                                <th> Nama Ruas </th>
                                <th> Panjang Kerusakan </th>
                                <th> Lebar Kerusakan </th>
                                <th> Kondisi Jalan </th>
                                <th> Foto Kerusakan </th>
                                <th> Status </th>
                            </tr>
                        </thead>
                       <tbody>
                        @foreach ($allLaporan as $rs)
                        <tr>
                            <td class="align-middle justify-center">{{ $loop->iteration }}</td>
                            <td class="align-middle justify-center">{{ $rs->nama_pelapor }}</td>
                            <td class="align-middle justify-center">{{ $rs->nama_ruas }}</td>
                            <td class="align-middle justify-center">{{ $rs->panjang_kerusakan }}</td>
                            <td class="align-middle justify-center">{{ $rs->lebar_kerusakan }}</td>
                            <td class="align-middle justify-center">{{ $rs->kondisi_jalan }}</td>
                            <td class="align-middle justify-center"> <img src="{{ asset('images/' . $rs->image) }}" alt="Kerusakan"
                                    width="100"> </td>
                            <td class="align-middle justify-center">
                                @if ($rs->status == 'Dalam Pemeriksaan Petugas')
                                <span class="badge badge-gradient-danger">{{ $rs->status }}</span>
                                @elseif ($rs->status == 'Sedang Dalam Pengerjaan')
                                <span class="badge badge-gradient-primary">{{ $rs->status }}</span>
                                @elseif ($rs->status == 'Ruas Jalan Sudah diPerbaiki')
                                <span class="badge badge-gradient-success">{{ $rs->status }}</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
