@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>{{ Auth::user()->nama_depan." ".Auth::user()->nama_belakang }}</td>
                        <td>{{ Auth::user()->email }}</td>
                        <td><a href="{{ route("profile.edit", Auth::user()->id) }}" class="btn btn-warning">Edit</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
