@extends('layout.v_template')
@section('title', 'Detail Guru')
@section('content')
    <table class="table">
        <tr>
            <th width="100">NIP</th>
            <th width="30">:</th>
            <th>{{ $guru->nip }}</th>
        </tr>
        <tr>
            <th width="100">Nama</th>
            <th width="30">:</th>
            <th>{{ $guru->nama_guru }}</th>
        </tr>
        <tr>
            <th width="100">Mapel</th>
            <th width="30">:</th>
            <th>{{ $guru->mapel }}</th>
        </tr>
        <tr>
            <th width="100">Foto</th>
            <th width="30">:</th>
            <th><img src="{{ url('img/' . $guru->foto_guru) }}" alt="foto_guru" width="120px"></th>
        </tr>
        <tr><a href="/guru" class="btn btn-danger btn-sm-end mb-4">Kembali</a></tr>
    </table>
@endsection
