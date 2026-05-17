@section('title', 'KULANICI DÜZENLE')

@extends('dashboard.layout')

@section('content')
<div class="container mt-2">
    <div class="card shadow-lg">
        <div class="card-body p-5">
            <h4 class="text-xl title">Kullanıcı Düzenle</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label thead">İsim</label>
                    <input type="text" name="name" class="içerik form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label thead">E-posta</label>
                    <input type="email" name="email" class="içerik form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="güncel1 btn btn-success">Bilgileri Güncelle</button>
                    <a href="{{ route('dashboard.users.index') }}" class="btn btn-secondary me-2">Geri Dön</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection