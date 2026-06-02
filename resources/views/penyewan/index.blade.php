@extends('layouts.app')

@section('content')
<div class="row" style="margin-top: 30px;">
    <div class="col s12">
        <div class="card white">
            <div class="card-content">
                <div class="row valign-wrapper" style="margin-bottom: 20px;">
                    <div class="col s6">
                        <h5 class="grey-text text-darken-4" style="margin: 0;">Data Penyewaan</h5>
                    </div>
                    <div class="col s6 right-align">
                        <a href="{{ route('penyewan.create') }}" class="btn waves-effect waves-light teal">
                            Tambah Penyewaan
                        </a>
                    </div>
                </div>
                <table class="striped responsive-table">
                    <thead>
                        <tr>
                            <th>Nama Penyewa</th>
                            <th>Gedung</th>
                            <th>Tanggal Sewa</th>
                            <th>Durasi</th>
                            <th>Total Harga</th>
                            <th class="center-align">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penyewans as $penyewan)
                            <tr>
                                <td>{{ $penyewan->nama_penyewa }}</td>
                                <td>{{ $penyewan->gedung->nama_gedung }}</td>
                                <td>{{ $penyewan->tanggal_sewa }}</td>
                                <td>{{ $penyewan->durasi_hari }} Hari</td>
                                <td>Rp {{ number_format($penyewan->total_harga, 0, ',', '.') }}</td>
                                <td class="center-align">
                                    <div style="display: flex; justify-content: center; gap: 10px;">
                                        <a href="{{ route('penyewan.edit', $penyewan->id) }}" class="btn-small orange waves-effect waves-light">
                                            Edit
                                        </a>
                                        <form action="{{ route('penyewan.destroy', $penyewan->id) }}" method="POST">
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
