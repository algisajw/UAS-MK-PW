@extends('layouts.app')

@section('content')
<div class="row" style="margin-top: 30px;">
    <div class="col s12 m8 offset-m2">
        <div class="card white">
            <div class="card-content">
                <span class="card-title grey-text text-darken-4">Tambah Data Gedung</span>
                <form action="{{ route('gedung.store') }}" method="POST">
                    @csrf
                    <div class="input-field">
                        <input type="text" name="nama_gedung" id="nama_gedung" required class="validate">
                        <label for="nama_gedung">Nama Gedung</label>
                    </div>
                    <div class="input-field">
                        <input type="number" name="kapasitas" id="kapasitas" required class="validate">
                        <label for="kapasitas">Kapasitas (Orang)</label>
                    </div>
                    <div class="input-field">
                        <input type="text" name="lokasi" id="lokasi" required class="validate">
                        <label for="lokasi">Lokasi</label>
                    </div>
                    <div class="input-field">
                        <input type="number" name="harga_sewa" id="harga_sewa" required class="validate">
                        <label for="harga_sewa">Harga Sewa per Hari (Rp)</label>
                    </div>
                    <div class="row" style="margin-top: 30px; margin-bottom: 0;">
                        <div class="col s6">
                            <a href="{{ route('gedung.index') }}" class="btn grey lighten-1 black-text waves-effect" style="width: 100%;">
                                Kembali
                            </a>
                        </div>
                        <div class="col s6">
                            <button type="submit" class="btn waves-effect waves-light teal" style="width: 100%;">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
