@extends('layout.master')

@section('heading')
Tambah Mentee Baru
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Formulir Mentee</h6>
            </div>
            <div class="card-body">
                <form action="/mentee" method="POST">
                    @csrf {{-- Penting untuk keamanan Laravel --}}

                    <div class="form-group">
                        <label for="nama_mentee">Nama Mentee</label>
                        <input type="text" class="form-control" id="nama_mentee" name="nama_mentee" value="{{ old('nama_mentee') }}" placeholder="Masukkan nama mentee" required>
                        @error('nama_mentee')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email_mentee">Email Mentee</label>
                        <input type="email" class="form-control" id="email_mentee" name="email_mentee" value="{{ old('email_mentee') }}" placeholder="Masukkan email mentee" required>
                        @error('email_mentee')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kelompok_id">Kelompok</label>
                        <select class="form-control" id="kelompok_id" name="kelompok_id" required>
                            <option value="">Pilih Kelompok</option>
                            {{-- Loop ini akan diisi dari data yang dikirim oleh controller --}}
                            {{-- @foreach ($kelompoks as $kelompok)
                                <option value="{{ $kelompok->id }}" {{ old('kelompok_id') == $kelompok->id ? 'selected' : '' }}>{{ $kelompok->nama_kelompok }}</option>
                            @endforeach --}}
                        </select>
                        @error('kelompok_id')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Mentee</button>
                    <a href="/mentee" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection