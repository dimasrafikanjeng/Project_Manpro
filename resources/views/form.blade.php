@extends('layout.master')

@section('heading')
Form Absensi
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-8 col-lg-10">
        <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="m-0">Form Absen Peserta</h5>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('absensi.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="nama_peserta">Nama Peserta</label>
                        <input type="text" name="nama_peserta" class="form-control" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="nim">NIM</label>
                        <input type="text" name="nim" class="form-control" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="keterangan">Keterangan</label>
                        <select name="keterangan" class="form-control" required>
                            <option value="">-- Pilih Keterangan --</option>
                            <option value="Hadir">Hadir</option>
                            <option value="Izin">Izin</option>
                            <option value="Sakit">Sakit</option>
                            <option value="Alpa">Alpa</option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="kelompok_id">Kelompok</label>
                        <select name="kelompok_id" class="form-control" required>
                            <option value="">-- Pilih Kelompok --</option>
                            @foreach ($kelompok as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kelompok }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-success">Kirim Absen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
