@extends('layouts.app')

@section('content')
    
<h2>Selamat datang {{ Auth::user()->nama_depan." ".Auth::user()->nama_belakang }}</h2>
<a href="{{ route("logout") }}">Logout</a>

@endsection
