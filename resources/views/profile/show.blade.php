@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
    <style>
        label { display: block; margin-top: 12px; font-weight: bold; }
        input { width: 100%; padding: 8px; margin-top: 4px; box-sizing: border-box; }
        .error { color: #b91c1c; font-size: 14px; margin-top: 4px; }
        .profile-card { background: #f8fafc; border: 1px solid #e2e8f0; padding: 16px; border-radius: 8px; margin-bottom: 24px; }
        .form-card { max-width: 450px; }
    </style>

    <h1>Profil Saya</h1>

    <div class="profile-card form-card">
        <p><strong>Nama:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
    </div>

    <h2>Ganti Password</h2>

    <div class="form-card">
        <form action="{{ route('profile.updatePassword') }}" method="POST">
            @csrf
            @method('PUT')

            <label for="password_lama">Password Lama</label>
            <input type="password" name="password_lama" id="password_lama">
            @error('password_lama')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="password_baru">Password Baru (min. 8 karakter)</label>
            <input type="password" name="password_baru" id="password_baru">
            @error('password_baru')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="password_baru_confirmation">Konfirmasi Password Baru</label>
            <input type="password" name="password_baru_confirmation" id="password_baru_confirmation">

            <br><br>
            <button type="submit" class="btn">Perbarui Password</button>
        </form>
    </div>
@endsection