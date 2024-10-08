@extends('layouts.main')

@section('content')
    <h4>Mahasiswa</h4>
    {{-- Button Tambah --}}
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambah</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>NPM</th>
                <th>Nama Mahasiswa</th>
                <th>Tanggal Lahir</th>
                <th>Tempat Lahir</th>
                <th>Prodi</th>
            </tr>
        </thead>
        <tbody> 
            @foreach ( $mahasiswa as $row )
        <tr>
            <td>{{ $row['npm'] }}</td>
            <td>{{ $row['nama'] }}</td>
            <td>{{ $row['tanggal_lahir'] }}</td>
            <td>{{ $row['tempat_lahir'] }}</td>
            <td>{{ $row['prodi']['nama']}}</td>
            {{-- Untuk menambahkan button show pada mahasiswa --}}
            <td><a href="{{ route('mahasiswa.show', $row['id'])}}" class="btn btn-primary btn-xs">show</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection