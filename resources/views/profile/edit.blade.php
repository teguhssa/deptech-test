@extends('layouts.app')

@section('content')

<div class="container">
    {!! Form::model($user, ['method' => 'post', 'route' => ['profile.update', $user->id]]) !!}
        @method('PUT')
        <div class="form-group">
            <label for="">Nama Depan</label>
            <input type="text" name="nama_depan" class="form-control" value="{{ $user->nama_depan }}">
        </div>
        <div class="form-group">
            <label for="">Nama Belakang</label>
            <input type="text" name="nama_belakang" class="form-control" value="{{ $user->nama_belakang }}">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
            <i class="text-danger">
                {{ $errors->first('email') }}
            </i>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control">
            <i>*Isi jika ingin password.</i>
            <i class="text-danger">
                {{ $errors->first('password') }}
            </i>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    {!! Form::close() !!}
</div>
    
@endsection