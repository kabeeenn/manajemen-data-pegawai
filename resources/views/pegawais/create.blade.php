{{-- resources\views\pegawais\create.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Tambah Pegawai') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('pegawais.store') }}" method="POST">
                        @csrf
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="nama">{{ __('Nama') }}</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="alamat">{{ __('Alamat') }}</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" required>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="tanggal_lahir">{{ __('Tanggal Lahir') }}</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="unit_id">{{ __('Unit') }}</label>
                                    <select class="form-control" id="unit_id" name="unit_id" required>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : '' }}>{{ $unit->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </li>
                        </ul>
                        <div class="text-center mt-3">
                            <button type="submit" class="button-1 mt-2 w-100 bg-teal-100">{{ __('Simpan') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
