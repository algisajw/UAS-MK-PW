@extends('layouts.app')

@section('content')
<div class="row" style="margin-top: 50px;">
    <div class="col s12 m6 offset-m3">
        <div class="card white">
            <div class="card-content">
                <span class="card-title center-align grey-text text-darken-4">Masuk ke Sewain</span>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-field">
                        <input type="email" name="email" id="email" required class="validate">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" id="password" required class="validate">
                        <label for="password">Password</label>
                    </div>
                    @if($errors->any())
                        <div class="red-text" style="margin-bottom: 15px;">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    <div class="center-align" style="margin-top: 30px;">
                        <button type="submit" class="btn waves-effect waves-light indigo darken-3 style-btn" style="width: 100%;">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
