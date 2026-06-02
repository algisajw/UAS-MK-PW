@extends('layouts.app')

@section('content')
<div class="row" style="margin-top: 30px;">
    <div class="col s12 m8 offset-m2">
        <div class="card white">
            <div class="card-content">
                <span class="card-title grey-text text-darken-4">Ubah Data Penyewaan</span>
                <form action="{{ route('penyewan.update', $penyewan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="input-field">
                        <input type="text" name="nama_penyewa" id="nama_penyewa" value="{{ $penyewan->nama_penyewa }}" required class="validate">
                        <label for="nama_penyewa">Nama Penyewa</label>
                    </div>
                    <div class="input-field">
                        <select name="gedung_id" required>
                            @foreach($gedungs as $gedung)
                                <option value="{{ $gedung->id }}" {{ $gedung->id == $penyewan->gedung_id ? 'selected' : '' }}>
                                    {{ $gedung->nama_gedung }} (Rp {{ number_format($gedung->harga_sewa, 0, ',', '.') }}/Hari)
                                </option>
                            @endforeach
                        </select>
                        <label>Gedung</label>
                    </div>
                    <div class="input-field" style="margin-top: 35px;">
                        <input type="date" name="tanggal_sewa" id="tanggal_sewa" value="{{ $penyewan->tanggal_sewa }}" required class="validate">
                        <label for="tanggal_sewa" class="active">Tanggal Sewa</label>
                    </div>
                    <div class="input-field">
                        <input type="number" name="durasi_hari" id="durasi_hari" value="{{ $penyewan->durasi_hari }}" required class="validate">
                        <label for="durasi_hari">Durasi (Hari)</label>
                    </div>
                    <div class="row" style="margin-top: 30px; margin-bottom: 0;">
                        <div class="col s6">
                            <a href="{{ route('penyewan.index') }}" class="btn grey lighten-1 black-text waves-effect" style="width: 100%;">
                                Kembali
                            </a>
                        </div>
                        <div class="col s6">
                            <button type="submit" class="btn waves-effect waves-light teal" style="width: 100%;">
                                Perbarui
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
