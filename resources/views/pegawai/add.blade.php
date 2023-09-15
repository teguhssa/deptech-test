@extends('layouts.app')

@section('content')

<div class="container">
    {!! Form::open(['method' => 'post', 'route' => ['pegawai.store']]) !!}
        <div class="form-group mb-4">
            <label for="">Nama Depan</label>
            <input type="text" name="nama_depan" class="form-control" value="{{ old('nama_depan') }}">
            <i class="text-danger">{{ $errors->first('nama_depan') }}</i>
        </div>
        <div class="form-group mb-4">
            <label for="">Nama Belakang</label>
            <input type="text" name="nama_belakang" class="form-control" value="{{ old('nama_belakang') }}">
            <i class="text-danger">{{ $errors->first('nama_belakang') }}</i>
        </div>
        <div class="form-group mb-4">
            <label for="">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="">- Pilh -</option>
                <option value="l" @if(old('jenis_kelamin') == 'l') selected @endif>Laki - Laki</option>
                <option value="p" @if(old('jenis_kelamin') == 'p') selected @endif>Perempuan</option>
            </select>
            <i class="text-danger">{{ $errors->first('jenis_kelamin') }}</i>
        </div>
        <div class="form-group mb-4">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            <i class="text-danger">{{ $errors->first('email') }}</i>
        </div>
        <div class="form-group mb-4">
            <label for="">No HP</label>
            <input type="number" name="no_hp" class="form-control" value="{{ old('no_hp') }}">
            <i class="text-danger">{{ $errors->first('no_hp') }}</i>
        </div>
        <div class="form-group mb-4">
            <label for="">Alamat</label>
            <textarea name="alamat" class="form-control" rows="10">{{ old('alamat') }}</textarea>
            <i class="text-danger">{{ $errors->first('alamat') }}</i>
        </div>
        <div class="form-group mb-4">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    {!! Form::close() !!}
</div>

@endsection