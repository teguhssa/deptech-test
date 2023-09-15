@extends('layouts.app')

@section('content')

<div class="container">
    {!! Form::open(['method' => 'post', 'route' => ['cuti.store']]) !!}
        <div class="form-group mb-4">
            <label for="">Nama Pegawai</label>
            <select name="pegawai" class="form-control">
                <option value="">- Pilh -</option>
                @foreach ($pegawai as $row)
                    <option value="{{ $row->id }}">{{ $row->nama_depan.' '.$row->nama_belakang }}</option>
                @endforeach
            </select>
            <i class="text-danger">{{ $errors->first('pegawai') }}</i>
        </div>
        <div class="form-group mb-4">
            <label for="">Alasan</label>
            <input type="text" name="alasan_cuti" class="form-control" value="{{ old('alasan_cuti') }}">
            <i class="text-danger">{{ $errors->first('alasan_cuti') }}</i>
        </div>
        <div class="form-group mb-4">
            <label for="">Mulai Cuti</label>
            <input type="date" name="mulai_cuti" class="form-control" value="{{ old('mulai_cuti') }}">
            <i class="text-danger">{{ $errors->first('mulai_cuti') }}</i>
        </div>
        <div class="form-group mb-4">
            <label for="">Selesai Cuti</label>
            <input type="date" name="selesai_cuti" class="form-control" value="{{ old('selesai_cuti') }}">
            <i class="text-danger">{{ $errors->first('selesai_cuti') }}</i>
        </div>
        <div class="form-group mb-4">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    {!! Form::close() !!}
</div>

@endsection