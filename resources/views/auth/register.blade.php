@extends('layouts.app')

@section('content')
<div class="row" style="margin-top: 50px;">
    <div class="col s12 m6 offset-m3">
        <div class="card white">
            <div class="card-content">
                <span class="card-title center-align grey-text text-darken-4">Daftar Akun</span>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="input-field">
                        <input type="text" name="name" id="name" required class="validate">
                        <label for="name">Nama Lengkap</label>
                    </div>
                    <div class="input-field">
                        <input type="email" name="email" id="email" required class="validate">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" id="password" required class="validate">
                        <label for="password">Password (Minimal 8 Karakter)</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password_confirmation" id="password_confirmation" required class="validate">
                        <label for="password_confirmation">Konfirmasi Password</label>
                    </div>
                    @if($errors->any())
                        <div class="red-text" style="margin-bottom: 15px;">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    <div class="center-align" style="margin-top: 30px;">
                        <button type="submit" class="btn waves-effect waves-light indigo darken-3" style="width: 100%;">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
