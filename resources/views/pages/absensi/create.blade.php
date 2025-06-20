@extends('layout.master')

@section('heading')
Form Absensi
@endsection

@section('content')
<div class="container mt-4">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('absensi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_peserta" class="form-label">Nama Peserta</label>
            <input type="text" name="nama_peserta" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <select name="keterangan" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
                <option value="Alpa">Alpa</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="kelompok_id" class="form-label">Kelompok</label>
            <select name="kelompok_id" class="form-control" required>
                <option value="">-- Pilih Kelompok --</option>
                @foreach ($kelompok as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kelompok }} - Mentor: {{ $k->mentor->nama_mentor ?? 'N/A' }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Absen</button>
    </form>
</div>
@endsection
