@extends('components.app')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Karwayan beserta Akses</h4>
                    <a href="{{ route('user.create') }}" class="btn btn-success text"><i class="ti-plus"></i></a>
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
                                    <th> Nama Karyawan </th>
                                    <th> Email Karyawan </th>
                                    <th> Jabatan </th>
                                    <th> ACTION </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($user->count() > 0)
                                    @foreach ($user as $rs)
                                        <tr>
                                            <td class="align-middle justify-center">{{ $loop->iteration }}</td>
                                            <td class="align-middle justify-center">{{ $rs->name }}</td>
                                            <td class="align-middle justify-center">{{ $rs->email }}</td>
                                            <td class="align-middle justify-center">{{ $rs->jabatan }}</td>
                                            <td class="align-middle justify-center">
                                                <form action="{{ route('user.destroy', $rs->id) }}" method="POST"
                                                    onsubmit="return confirm('Anda yakin ingin menghapus data ini ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn-outline-primary"><i class="ti-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data pengguna.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
