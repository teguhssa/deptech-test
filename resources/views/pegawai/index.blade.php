@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{ route('pegawai.add') }}" class="btn btn-primary">Tambah</a>
    <div class="table-responsive mt-2">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>no</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pegawai as $no => $row)                    
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $row->nama_depan.' '.$row->nama_belakang }}</td>
                        <td>
                            @if ($row->jenis_kelamin == 'L')
                                Laki - Laki
                            @else
                                Perempuan
                            @endif    
                        </td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->no_hp }}</td>
                        <td>{{ $row->alamat }}</td>
                        <td>
                            <a href="{{ route('pegawai.edit', $row->id) }}" class="btn btn-warning mr-2">Edit</a>
                            <a href="{{ route('pegawai.delete', $row->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection