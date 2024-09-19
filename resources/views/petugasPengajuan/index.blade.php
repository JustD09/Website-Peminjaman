@extends('partials.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Sistem Informasi Pengelolaan Usul Pinjaman</h3>
                    <div class="table-responsive">
                        <table class="table">
                            @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if (session('warning'))
                                <div class="alert alert-warning">
                                    {{ session('warning') }}
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
                                    <th> Nama </th>
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
                                @if ($petugasPengajuan->count() > 0)
                                    @foreach ($petugasPengajuan as $rs)
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
                                                <a href="{{ route('petugasPengajuan.show', $rs->id) }}"
                                                    class="btn-outline-grey"><i class="mdi mdi-eye-outline"></i></a>
                                                <a href="{{ route('petugasPengajuan.edit', $rs->id) }}"
                                                    class="btn-outline-grey"><i class="ti-pencil-alt"></i></a>
                                                <form action="{{ route('petugasPengajuan.destroy', $rs->id) }}" method="POST"
                                                    onsubmit="return confirm('Anda yakin ingin menghapus berkas ini ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn-outline-grey"><i class="ti-trash"></i></button>
                                                </form>
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
