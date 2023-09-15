@extends('layouts.app')

@section('content')

<div class="container">
    {!! Form::model($cuti, ['method' => 'post', 'route' => ['cuti.update', $cuti->id]]) !!}
    @method('PUT')
        <div class="form-group mb-4">
            <label for="">Nama Pegawai</label>
            <select name="pegawai" class="form-control">
                <option value="">- Pilh -</option>
                @foreach ($pegawai as $row)
                    <option value="{{ $row->id }}" @if($row->id==$cuti->pegawai_id) selected @endif>{{ $row->nama_depan.' '.$row->nama_belakang }}</option>
                @endforeach
            </select>
            <i class="text-danger">{{ $errors->first('pegawai') }}</i>
        </div>
        <div class="form-group mb-4">
            <label for="">Alasan</label>
            <input type="text" name="alasan_cuti" class="form-control" value="{{ $cuti->alasan_cuti }}">
            <i class="text-danger">{{ $errors->first('alasan_cuti') }}</i>
        </div>
        <div class="form-group mb-4">
            <label for="">Mulai Cuti</label>
            <input type="date" name="mulai_cuti" class="form-control" value="{{ $cuti->mulai_cuti }}">
            <i class="text-danger">{{ $errors->first('mulai_cuti') }}</i>
        </div>
        <div class="form-group mb-4">
            <label for="">Selesai Cuti</label>
            <input type="date" name="selesai_cuti" class="form-control" value="{{ $cuti->selesai_cuti }}">
            <i class="text-danger">{{ $errors->first('selesai_cuti') }}</i>
        </div>
        <div class="form-group mb-4">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    {!! Form::close() !!}
</div>

@endsection