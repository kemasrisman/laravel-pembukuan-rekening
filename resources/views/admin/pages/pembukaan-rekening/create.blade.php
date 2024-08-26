@extends('admin.layouts.master')
@section('title', 'Pembukaan Nasabah')
{{-- Content body: main page content --}}

{{-- header --}}
@section('content_header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pembukaan Rekening</li>
    </ol>
</nav>
@stop

@section('content')
{{-- card content --}}
<div class="card mt-2">
    <div class="card-header">
        <h2 class="card-title">Pembukaan Rekening Calon Nasabah</h2>
    </div>
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
                        <label for="nominal_setor" class="col-sm-3 col-form-label">Nominal Setor</label>
                        <div class="col-sm-9">
                            <input type="number" name="nominal_setor" class="form-control @error('nominal_setor') is-invalid @enderror" id="nominal_setor" placeholder="Nominal Setor" value="{{ old('nominal_setor') }}">
                            @error('nominal_setor')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-3">
                        <label for="provinsi" class="col-sm-3 col-form-label">Provinsi</label>
                        <div class="col-sm-9">
                            <select class="form-control select2 @error('provinsi') is-invalid @enderror" name="provinsi" id="provinsi">
                                <option value="">Pilih Provinsi</option>
                                <!-- Daftar provinsi -->
                                @foreach ($provinsis as $itemProvinsi)
                                    <option value="{{ $itemProvinsi->id }}" {{ old('provinsi') == $itemProvinsi->id ? 'selected' : '' }}>{{ $itemProvinsi->name }}</option>
                                @endforeach
                            </select>
                            @error('provinsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kota" class="col-sm-3 col-form-label">Kota/Kabupaten</label>
                        <div class="col-sm-9">
                            <select class="form-control select2 kota-select @error('kota') is-invalid @enderror" name="kota" id="kota" disabled><option value="">Pilih Kota/Kabupaten</option></select>
                            @error('kota')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
                        <div class="col-sm-9">
                            <select class="form-control select2 kecamatan-select @error('kecamatan') is-invalid @enderror" name="kecamatan" id="kecamatan" disabled><option value="">Pilih Kecamatan</option></select>
                            @error('kecamatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kelurahan" class="col-sm-3 col-form-label">Kelurahan</label>
                        <div class="col-sm-9">
                            <select class="form-control select2 kelurahan-select @error('kelurahan') is-invalid @enderror" name="kelurahan" id="kelurahan" disabled><option value="">Pilih Kelurahan</option></select>
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
                </div>
                {{-- simpan at right --}}
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
    
</div>
@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    <!-- Select2 -->
    <link rel="stylesheet" href="/vendor/select2/css/select2.min.css">
    <link rel="stylesheet" href="/vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush

{{-- Push extra scripts --}}

@push('js')
    <script src="/vendor/select2/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                theme: 'bootstrap4'
            });

            @if(session('error'))
                toastr.error("{{ session('error') }}");
            @endif

            // Get Data Kota/Kabupaten
            $('#provinsi').on('change', function() {
                let provinsiId = $(this).val();
                if (provinsiId) {
                    $.ajax({
                        url: '{{ route('wilayah.get-kabupaten') }}',
                        type: 'GET',
                        data: { provinsi: provinsiId },
                        success: function(data) {
                            $('#kota').prop('disabled', false);
                            $('#kota').empty().append('<option value="">Pilih Kota/Kabupaten</option>');
                            $.each(data, function(key, value) {
                                $('#kota').append('<option value="' + value.id + '">' + value.type + ' '  + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#kota').empty().append('<option value="">Pilih Kota/Kabupaten</option>');
                }
            });

            // Get Data Kecamatan
            $('#kota').on('change', function() {
                let kabupatenId = $(this).val();
                if (kabupatenId) {
                    $.ajax({
                        url: '{{ route('wilayah.get-kecamatan') }}',
                        type: 'GET',
                        data: { kabupaten: kabupatenId },
                        success: function(data) {
                            $('#kecamatan').prop('disabled', false);
                            $('#kecamatan').empty().append('<option value="">Pilih Kecamatan</option>');
                            $.each(data, function(key, value) {
                                $('#kecamatan').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#kecamatan').empty().append('<option value="">Pilih Kecamatan</option>');
                }
            });

            // Get Data Kelurahan
            $('#kecamatan').on('change', function() {
                let kecamatanId = $(this).val();
                if (kecamatanId) {
                    $.ajax({
                        url: '{{ route('wilayah.get-kelurahan') }}',
                        type: 'GET',
                        data: { kecamatan: kecamatanId },
                        success: function(data) {
                            $('#kelurahan').prop('disabled', false);
                            $('#kelurahan').empty().append('<option value="">Pilih Kelurahan</option>');
                            $.each(data, function(key, value) {
                                $('#kelurahan').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#kelurahan').empty().append('<option value="">Pilih Kelurahan</option>');
                }
            });
        });
    </script>
@endpush