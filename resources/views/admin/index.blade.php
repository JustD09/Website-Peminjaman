@extends('components.app')

@section('content')
    <div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Sistem Informasi Pengelolaan Usul Pinjaman</h3>
                <a href="{{ route('admin.create') }}" class="btn btn-success text">Masukan Berkas!</a>
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
                                <th> Slip Gaji </th>
                                <th> Surat Data Riwayat </th>
                                <th> Rincian Gaji </th>
                                <th> ACTION </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($admin->count() > 0)
                            @foreach ($admin as $rs)
                            <tr>
                                <td class="align-middle justify-center">{{ $loop->iteration }}</td>
                                <td class="align-middle justify-center">{{ $rs->nama }}</td>
                                <td class="align-middle justify-center">{{$rs->slip_gaji}}</td>
                                <td class="align-middle justify-center">{{$rs->data_riwayat}}</td>
                                <td class="align-middle justify-center">{{$rs->rincian_gaji}}</td>
                                <td class="align-middle justify-center">
                                    <a href="{{ route('admin.show', $rs->id) }}" class="btn-outline-grey"><i
                                            class="mdi mdi-eye-outline"></i></a>
                                     <a href="{{ route('admin.edit', $rs->id) }}" class="btn-outline-grey"><i class="ti-pencil-alt"></i></a>
                                    <form action="{{ route('admin.destroy', $rs->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus berkas ini ?')">
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