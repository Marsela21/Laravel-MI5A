@extends('layouts.main')

@section('content')
    @foreach ( $Prodiis as $row )
        {{$row['nama'] }}
    @endforeach
@endsection