@extends('layouts.main')

@section('content')
<h4>Fakultas</h4>
<form action="{{route('fakultas.store')}}" method="post">
    @csrf
    Nama
    @error('nama')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="text" name="npm" id="" class="form-control mb-2" value="{{ $fakultas['nama'] }}"> 

    Dekan 
    @error('dekan')
        <span class="text-danger">({{ $message }})</span>
    @enderror
    <input type="text" name="dekan" id="" class="form-control mb-2" value="{{ $fakultas['dekan'] }}">

    Singkatan
    @error('singkatan')
        <span class="text-danger">({{ $message }})</span>
    @enderror 
    <input type="date" name="singkatan" id="" class="form-control mb-2"value="{{ $fakultas['singkatan'] }}">

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@endsection