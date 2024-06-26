@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <a href="{{ route('pegawais.create') }}" class="button-1 mb-2 w-100 bg-teal-100">Tambah Pegawai</a>
            <ul class="list-group max-w-">
                @foreach ($pegawais as $pegawai)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="mx-1">{{ $pegawai->nama }} - {{ $pegawai->unit->nama }}</span>
                    <span class="d-inline-flex gap-1">
                        <a href="{{ route('pegawais.show', $pegawai) }}" class="button-1 btn-sm mr-1 bg-yellow-200">Lihat</a>
                        <a href="{{ route('pegawais.edit', $pegawai) }}" class="button-1 btn-sm mr-1 bg-teal-200">Edit</a>
                        <form action="{{ route('pegawais.destroy', $pegawai) }}" method="POST" style="display:inline" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button-1 btn-sm bg-red-200">Hapus</button>
                        </form>
                    </span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<script>
    function confirmDelete() {
        return confirm('Apakah Anda yakin ingin menghapus data ini?');
    }
</script>
@endsection
