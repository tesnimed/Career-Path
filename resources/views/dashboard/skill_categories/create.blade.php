@section('title', 'BECERİ KATEGORİSİ KAYIT')
@extends('dashboard.layout')
@section('content')
<div class="container mt-2">
    <div class="card shadow-lg">
        <div class="card-body p-5">
    <h2 class="text-xl title p-3">Yeni Yetenek Kategorisi Ekle</h2>
    <form action="{{ route('dashboard.skill_categories.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-4">
                <label class="p-2 thead">Kategori Adı: </label><br>
                <input type="text" name="name" class="w-full border rounded outline-none p-2" required>
            </div>
        </div>
        <button type="submit" class="kaydet btn px-8 py-2 rounded">Bölümü Kaydet</button>
        <a href="{{ route('dashboard.skill_categories.index') }}" class="iptal btn py-2 me-3">İptal</a>
    </form>
</div>
@endsection