@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Detail Pegawai') }}</div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ __('Nama') }}: {{ $pegawai->nama }}</li>
                        <li class="list-group-item">{{ __('Alamat') }}: {{ $pegawai->alamat }}</li>
                        <li class="list-group-item">{{ __('Email') }}: {{ $pegawai->email }}</li>
                        <li class="list-group-item">{{ __('Tanggal Lahir') }}: {{ $pegawai->tanggal_lahir }}</li>
                        <li class="list-group-item">{{ __('Unit') }}: {{ $pegawai->unit->nama }}</li>
                    </ul>
                    <div class="text-center mt-3">
                        <a href="{{ route('pegawais.index') }}" class="button-1 w-100 bg-yellow-100">{{ __('Kembali') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
