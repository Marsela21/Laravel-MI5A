@extends('layouts.main')

@section('content')
    <h4>Fakultas</h4>
    <a href="{{route('fakultas.create')}}" class="btn btn-primary">Tambah</a>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>NamaFakultas</th>
                <th>Nama Dekan</th>
                <th>Singkatan</th>
                {{-- yang ditambahkan --}}
                <th>Ubah Data</th>
            </tr>
        </thead>
        <tbody> 
            @foreach ( $fakultas as $row )
        <tr>
            <td>{{ $row['nama'] }}</td>
            <td>{{ $row['dekan'] }}</td>
            <td>{{ $row['singkatan'] }}</td>
            {{-- yg ditambahkan --}}            
            <td><a href="{{ route ('fakultas.edit', $row['id'])}}" class="btn btn-xs btn-warning">Ubah</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection