@extends('layouts.app')

@section('content')
<div class="row" style="margin-top: 30px;">
    <div class="col s12">
        <div class="card white">
            <div class="card-content">
                <div class="row valign-wrapper" style="margin-bottom: 20px;">
                    <div class="col s6">
                        <h5 class="grey-text text-darken-4" style="margin: 0;">Data Gedung</h5>
                    </div>
                    <div class="col s6 right-align">
                        <a href="{{ route('gedung.create') }}" class="btn waves-effect waves-light teal">
                            Tambah Gedung
                        </a>
                    </div>
                </div>
                <table class="striped responsive-table">
                    <thead>
                        <tr>
                            <th>Nama Gedung</th>
                            <th>Kapasitas</th>
                            <th>Lokasi</th>
                            <th>Harga Sewa / Hari</th>
                            <th class="center-align">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gedungs as $gedung)
                            <tr>
                                <td>{{ $gedung->nama_gedung }}</td>
                                <td>{{ $gedung->kapasitas }} Orang</td>
                                <td>{{ $gedung->lokasi }}</td>
                                <td>Rp {{ number_format($gedung->harga_sewa, 0, ',', '.') }}</td>
                                <td class="center-align">
                                    <div style="display: flex; justify-content: center; gap: 10px;">
                                        <a href="{{ route('gedung.edit', $gedung->id) }}" class="btn-small orange waves-effect waves-light">
                                            Edit
                                        </a>
                                        <form action="{{ route('gedung.destroy', $gedung->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-small red waves-effect waves-light">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
