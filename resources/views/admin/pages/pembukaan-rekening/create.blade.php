@extends('admin.layouts.master')
@section('title', 'Nasabah')
{{-- Content body: main page content --}}

{{-- header --}}
@section('content_header')
    <h1>Pembukaan Rekening</h1>
@stop

@section('content')
{{-- card content --}}
<div class="card mt-2">
    {{-- <h3 class="card-header p-3">Tambah Nasabah</h3> --}}
    <div class="card-body">
        <form action="{{ route('nasabah.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-3 col-form-label">Nama Sesuai Identitas</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Sesuai Identitas" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-9">
                            <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Tempat Lahir" value="{{ old('tempat_lahir') }}">
                            @error('tempat_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                        <div class="col-sm-9">
                            <select class="form-control @error('id_pekerjaan') is-invalid @enderror" name="id_pekerjaan" id="pekerjaan">
                                <option value="">Pilih Pekerjaan</option>
                                @foreach ($pekerjaan as $item)
                                    <option value="{{ $item->id }}" {{ old('id_pekerjaan') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_pekerjaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="3">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-3">
                        <label for="provinsi" class="col-sm-3 col-form-label">Provinsi</label>
                        <div class="col-sm-9">
                            <select class="form-control @error('provinsi') is-invalid @enderror" name="provinsi" id="provinsi">
                                <option value="">Pilih Provinsi</option>
                                <!-- Daftar provinsi -->
                                <option value="Jawa Timur" {{ old('provinsi') == 'Jawa Timur' ? 'selected' : '' }}>Jawa Timur</option>
                                <!-- Tambahkan provinsi lainnya -->
                            </select>
                            @error('provinsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kota" class="col-sm-3 col-form-label">Kota/Kabupaten</label>
                        <div class="col-sm-9">
                            <select class="form-control @error('kota') is-invalid @enderror" name="kota" id="kota">
                                <option value="">Pilih Kota</option>
                                <!-- Daftar kota -->
                                <option value="Surabaya" {{ old('kota') == 'Surabaya' ? 'selected' : '' }}>Surabaya</option>
                                <!-- Tambahkan kota lainnya -->
                            </select>
                            @error('kota')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
                        <div class="col-sm-9">
                            <select class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan" id="kecamatan">
                                <option value="">Pilih Kecamatan</option>
                                <!-- Daftar kecamatan -->
                                <option value="Kecamatan A" {{ old('kecamatan') == 'Kecamatan A' ? 'selected' : '' }}>Kecamatan A</option>
                                <!-- Tambahkan kecamatan lainnya -->
                            </select>
                            @error('kecamatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kelurahan" class="col-sm-3 col-form-label">Kelurahan</label>
                        <div class="col-sm-9">
                            <select class="form-control @error('kelurahan') is-invalid @enderror" name="kelurahan" id="kelurahan">
                                <option value="">Pilih Kelurahan</option>
                                <!-- Daftar kelurahan -->
                                <option value="Kelurahan A" {{ old('kelurahan') == 'Kelurahan A' ? 'selected' : '' }}>Kelurahan A</option>
                                <!-- Tambahkan kelurahan lainnya -->
                            </select>
                            @error('kelurahan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama_jalan" class="col-sm-3 col-form-label">Nama Jalan</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_jalan" class="form-control @error('nama_jalan') is-invalid @enderror" id="nama_jalan" placeholder="Nama Jalan" value="{{ old('nama_jalan') }}">
                            @error('nama_jalan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="rt_rw" class="col-sm-3 col-form-label">RT/RW</label>
                        <div class="col-sm-4">
                            <input type="text" name="rt" class="form-control @error('rt') is-invalid @enderror" id="rt" placeholder="RT" value="{{ old('rt') }}">
                            @error('rt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-1 text-center">
                            <label for="rt" class="col-form-label">/</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="rw" class="form-control @error('rw') is-invalid @enderror" id="rw" placeholder="RW" value="{{ old('rw') }}">
                            @error('rw')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nominal_setor" class="col-sm-3 col-form-label">Nominal Setor</label>
                        <div class="col-sm-9">
                            <input type="number" name="nominal_setor" class="form-control @error('nominal_setor') is-invalid @enderror" id="nominal_setor" placeholder="Nominal Setor" value="{{ old('nominal_setor') }}">
                            @error('nominal_setor')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
</div>
@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
@endpush