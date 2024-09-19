@extends('partials.app')

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
                        <thead>
                            <tr>
                                <th> No. </th>
                                <th> Nama Nasabah </th>
                                <th> Kelengkapan Tunjangan Keluarga </th>
                                <th> Tanggungan </th>
                                <th> Pekerjaan Pasangan </th>
                                <th> Total Semua Potongan </th>
                                <th> Total Semua Tunjangan Kerja </th>
                                <th> Hasil </th>
                                <th> Status </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($petugas->count() > 0)
                            @foreach ($petugas as $rs)
                            <tr>
                                <td class="align-middle justify-center">{{ $loop->iteration }}</td>
                                <td class="align-middle justify-center">{{ $rs->nama_nasabah }}</td>
                                <td class="align-middle justify-center">{{ $rs->kelengkapan_tunjangan }}</td>
                                <td class="align-middle justify-center">{{ $rs->tanggungan }}</td>
                                <td class="align-middle justify-center">{{ $rs->pekerjaan }}</td>
                                <td class="align-middle justify-center">{{ $rs->total_potongan }}</td>
                                <td class="align-middle justify-center">{{ $rs->total_tunjangan }}</td>
                                <td class="align-middle justify-center">
                                    @if ($rs->hasil == 'Dalam Pemeriksaan Petugas')
                                    <span class="badge badge-warning">{{ $rs->hasil }}</span>
                                    @elseif ($rs->hasil == 'Mencapai')
                                    <span class="badge badge-success">{{ $rs->hasil }}</span>
                                    @elseif ($rs->hasil == 'Tidak Mencapai')
                                    <span class="badge badge-danger">{{ $rs->hasil }}</span>
                                    @endif
                                </td>
                                <td class="align-middle justify-center">
                                    @if ($rs->status == 'Dalam Pemeriksaan Petugas')
                                    <span class="badge badge-warning">{{ $rs->status }}</span>
                                    @elseif ($rs->status == 'Setuju')
                                    <span class="badge badge-success">{{ $rs->status }}</span>
                                    @elseif ($rs->status == 'Tidak Setuju')
                                    <span class="badge badge-danger">{{ $rs->status }}</span>
                                    @endif
                                </td>
                                <td class="align-middle justify-center">
                                    <a href="{{ route('petugas.show', $rs->id) }}" class="btn-outline-grey"><i
                                            class="mdi mdi-eye-outline"></i></a>
                                    <a href="{{ route('petugas.edit', $rs->id) }}" class="btn-outline-grey"><i class="ti-pencil-alt"></i></a>
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