@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{ route('cuti.add') }}" class="btn btn-primary">Tambah</a>
    <div class="table-responsive mt-2">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>no</th>
                    <th>Nama Pegawai</th>
                    <th>Alasan</th>
                    <th>Mulai</th>
                    <th>Selesai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cuti as $no => $row)                    
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $row->nama_depan.' '.$row->nama_belakang }}</td>
                        <td>{{ $row->alasan_cuti }}</td>
                        <td>{{ date('d M Y', strtotime($row->mulai_cuti)) }}</td>
                        <td>{{ date('d M Y', strtotime($row->selesai_cuti)) }}</td>
                        <td>
                            <a href="{{ route('cuti.edit', $row->id) }}" class="btn btn-warning mr-2">Edit</a>
                            <a href="{{ route('cuti.delete', $row->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection