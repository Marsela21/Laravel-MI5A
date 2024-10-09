@extends('layouts.main')

@section('content')
<h4>Program Studi</h4>
<a href="{{ route('prodiis.create') }}" class="btn btn-primary">Tambah</a>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Nama Prodi</th>
            <th>Kaprodi</th>
            <th>Singkatan</th>
            <th>Fakultas</th>
            {{-- yang ditambahkan --}}
            <th>Ubah Data</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($prodi as $row)
            <tr>
                <td>{{ $row['nama'] }}</td>
                <td>{{ $row['kaprodi'] }}</td>
                <td>{{ $row['singkatan'] }}</td>
                <td>{{ $row['fakultas']['nama'] }}</td>
            {{-- yg ditambahkan utk menambahakn button ubah --}}            
            <td><a href="{{ route ('prodiis.edit', $row['id'])}}" class="btn btn-xs btn-warning">Ubah</a>
                <form action="{{ route('prodiis.destroy', $row['id']) }}" method="post" style="display:inline">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-xs btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection