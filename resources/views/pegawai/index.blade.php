@extends('layouts.app')

@section('content')
    <div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Sistem Informasi Pengelolaan Usul Pinjaman</h4>
                <div class="table-responsive">
                    <table class="table">
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                        @endif
                        @if (session('error'))
                        <div class="alert alert-warning">
                            {{ session('error') }}
                        </div>
                        @endif
                        @if (session('danger'))
                        <div class="alert alert-danger">
                            {{ session('danger') }}
                        </div>
                        @endif
                        <a href="{{ route('pegawai.create') }}" class="btn btn-success text"><i class="ti-plus"> Masukan Berkas!</i></a>
                        <thead>
                            <tr>
                                <th> No. </th>
                                <th> Nama Nasabah </th>
                                <th> Slip Gaji </th>
                                <th> Surat Data Riwayat </th>
                                <th> Rincian Gaji </th>
                                <th> ACTION </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($pegawai->count() > 0)
                            @foreach ($pegawai as $rs)
                            <tr>
                                <td class="align-middle justify-center">{{ $loop->iteration }}</td>
                                <td class="align-middle justify-center">{{ $rs->nama }}</td>
                                <td class="align-middle justify-center">{{ $rs->slip_gaji}}</td>
                                <td class="align-middle justify-center">{{ $rs->data_riwayat }}</td>
                                <td class="align-middle justify-center">{{ $rs->rincian_gaji }}</td>
                                <td class="align-middle justify-center">
                                   <a href="{{ route('pegawai.show', $rs->id) }}" class="btn-outline-grey"><i class="ti-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection