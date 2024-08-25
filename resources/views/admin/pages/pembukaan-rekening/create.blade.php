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
        <form action="" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-3 col-form-label">Nama Sesuai Identitas</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Sesuai Identitas">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-9">
                            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="pekerjaan" id="pekerjaan">
                                <option value="">Pilih Pekerjaan</option>
                                <option value="PNS">PNS</option>
                                <option value="TNI">TNI</option>
                                <option value="POLRI">POLRI</option>
                                <option value="SWASTA">SWASTA</option>
                                <option value="WIRASWASTA">WIRASWASTA</option>
                                <option value="PELAJAR/MAHASISWA">PELAJAR/MAHASISWA</option>
                                <option value="LAINNYA">LAINNYA</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
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
                            <select class="form-control" name="provinsi" id="provinsi">
                                <option value="">Pilih Provinsi</option>
                                <option value="Jawa Timur">Jawa Timur</option>
                                <option value="Jawa Tengah">Jawa Tengah</option>
                                <option value="Jawa Barat">Jawa Barat</option>
                                <option value="DKI Jakarta">DKI Jakarta</option>
                                <option value="Banten">Banten</option>
                                <option value="Bali">Bali</option>
                                <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                                <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                                <option value="Kalimantan Barat">Kalimantan Barat</option>
                                <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                                <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                                <option value="Kalimantan Timur">Kalimantan Timur</option>
                                <option value="Kalimantan Utara">Kalimantan Utara</option>
                                <option value="Sulawesi Utara">Sulawesi Utara</option>
                                <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                                <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                                <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                                <option value="Sulawesi Barat">Sulawesi Barat</option>
                                <option value="Gorontalo">Gorontalo</option>
                                <option value="Maluku">Maluku</option>
                                <option value="Maluku Utara">Maluku Utara</option>
                                <option value="Papua">Papua</option>
                                <option value="Papua Barat">Papua Barat</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kota" class="col-sm-3 col-form-label">Kota/Kabupaten</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="kota" id="kota">
                                <option value="">Pilih Kota</option>
                                <option value="Surabaya">Surabaya</option>
                                <option value="Sidoarjo">Sidoarjo</option>
                                <option value="Gresik">Gresik</option>
                                <option value="Lamongan">Lamongan</option>
                                <option value="Mojokerto">Mojokerto</option>
                                <option value="Jombang">Jombang</option>
                                <option value="Madiun">Madiun</option>
                                <option value="Ngawi">Ngawi</option>
                                <option value="Bojonegoro">Bojonegoro</option>
                                <option value="Tuban">Tuban</option>
                                <option value="Pasuruan">Pasuruan</option>
                                <option value="Probolinggo">Probolinggo</option>
                                <option value="Malang">Malang</option>
                                <option value="Blitar">Blitar</option>
                                <option value="Kediri">Kediri</option>
                                <option value="Tulungagung">Tulungagung</option>
                                <option value="Ponorogo">Ponorogo</option>
                                <option value="Trenggalek">Trenggalek</option>
                                <option value="Magetan">Magetan</option>
                                <option value="Nganjuk">Nganjuk</option>
                                <option value="Pacitan">Pacitan</option>
                                <option value="Bondowoso">Bondowoso</option>
                                <option value="Situbondo">Situbondo</option>
                                <option value="Banyuwangi">Banyuwangi</option>
                                <option value="Jember">Jember</option>
                                <option value="Lumajang">Lumajang</option>
                                <option value="Malang">Malang</option>
                                <option value="Blitar">Blitar</option>
                                <option value="Kediri">Kediri</option>
                                <option value="Tulungagung">Tulungagung</option>
                                <option value="Ponorogo">Ponorogo</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="kecamatan" id="kecamatan">
                            <option value="">Pilih Kecamatan</option>
                            <option value="Kecamatan A">Kecamatan A</option>
                            <option value="Kecamatan B">Kecamatan B</option>
                            <option value="Kecamatan C">Kecamatan C</option>
                            <option value="Kecamatan D">Kecamatan D</option>
                            <option value="Kecamatan E">Kecamatan E</option>
                            <option value="Kecamatan F">Kecamatan F</option>
                            <option value="Kecamatan G">Kecamatan G</option>
                            <option value="Kecamatan H">Kecamatan H</option>
                            <option value="Kecamatan I">Kecamatan I</option>
                            <option value="Kecamatan J">Kecamatan J</option>
                            <option value="Kecamatan K">Kecamatan K</option>
                            <option value="Kecamatan L">Kecamatan L</option>
                            <option value="Kecamatan M">Kecamatan M</option>
                            <option value="Kecamatan N">Kecamatan N</option>
                            <option value="Kecamatan O">Kecamatan O</option>
                            <option value="Kecamatan P">Kecamatan P</option>
                            <option value="Kecamatan Q">Kecamatan Q</option>
                            <option value="Kecamatan R">Kecamatan R</option>
                            <option value="Kecamatan S">Kecamatan S</option>
                            <option value="Kecamatan T">Kecamatan T</option>
                            <option value="Kecamatan U">Kecamatan U</option>
                            <option value="Kecamatan V">Kecamatan V</option>
                            <option value="Kecamatan W">Kecamatan W</option>
                            <option value="Kecamatan X">Kecamatan X</option>
                            <option value="Kecamatan Y">Kecamatan Y</option>
                        </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kelurahan" class="col-sm-3 col-form-label">Kelurahan</label>
                        <div class="col-sm-9">
                        <select class="form-control" name="kelurahan" id="kelurahan">
                            <option value="">Pilih Kelurahan</option>
                            <option value="Kelurahan A">Kelurahan A</option>
                            <option value="Kelurahan B">Kelurahan B</option>
                            <option value="Kelurahan C">Kelurahan C</option>
                            <option value="Kelurahan D">Kelurahan D</option>
                            <option value="Kelurahan E">Kelurahan E</option>
                            <option value="Kelurahan F">Kelurahan F</option>
                            <option value="Kelurahan G">Kelurahan G</option>
                            <option value="Kelurahan H">Kelurahan H</option>
                            <option value="Kelurahan I">Kelurahan I</option>
                            <option value="Kelurahan J">Kelurahan J</option>
                            <option value="Kelurahan K">Kelurahan K</option>
                            <option value="Kelurahan L">Kelurahan L</option>
                            <option value="Kelurahan M">Kelurahan M</option>
                            <option value="Kelurahan N">Kelurahan N</option>
                            <option value="Kelurahan O">Kelurahan O</option>
                            <option value="Kelurahan P">Kelurahan P</option>
                            <option value="Kelurahan Q">Kelurahan Q</option>
                            <option value="Kelurahan R">Kelurahan R</option>
                            <option value="Kelurahan S">Kelurahan S</option>
                            <option value="Kelurahan T">Kelurahan T</option>
                            <option value="Kelurahan U">Kelurahan U</option>
                            <option value="Kelurahan V">Kelurahan V</option>
                            <option value="Kelurahan W">Kelurahan W</option>
                            <option value="Kelurahan X">Kelurahan X</option>
                            <option value="Kelurahan Y">Kelurahan Y</option>
                        </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama_jalan" class="col-sm-3 col-form-label">Nama Jalan</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_jalan" class="form-control" id="nama_jalan" placeholder="Nama Jalan">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama_jalan" class="col-sm-3 col-form-label">RT/RW</label>
                        <div class="col-sm-4">
                            <input type="text" name="rt" class="form-control" id="rt" placeholder="RT">
                        </div>
                        <div class="col-sm-1 text-center">
                            <label for="rt" class="col-form-label">/</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="rw" class="form-control" id="rw" placeholder="RW">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nominal_setor" class="col-sm-3 col-form-label">Nominal Setor</label>
                        <div class="col-sm-9">
                            <input type="number" name="nominal_setor" class="form-control" id="nominal_setor" placeholder="Nominal Setor">
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