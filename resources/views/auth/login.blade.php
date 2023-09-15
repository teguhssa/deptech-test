@extends('layouts.app')

@section('content')

{!! Form::open(["method" => "post", "route" => ["proses-login"]]) !!}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Email</label>
                    <input name="email" type="email" class="form-control" value="{{ old("email") }}" />
                    <i>{{ $errors->first("email") }}</i>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input name="password" type="password" class="form-control" />
                    <i>{{ $errors->first("password") }}</i>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}

@endsection