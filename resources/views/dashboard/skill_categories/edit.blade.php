@section('title', 'BECERİ KATEGORİLERİ DÜZENLE')

@extends('dashboard.layout')

@section('content')
<div class="container mt-4 card shadow-lg p-4 mt-5">
    <h2 class="text-xl title p-4 border-bottom mb-4">Kategoriyi Düzenle</h2>
    
    <form action="{{ route('dashboard.skill_categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <div>
                <label class="thead form-label fw-bold p-3">Kategori Adı</label><br>
                <input type="text" name="name" value="{{ $category->name_tr }}" class="w-full border rounded p-2 outline-none" required>
            </div>
        </div>

        <div class="mt-6 border-top pt-3">
            <button type="submit" class="güncel mb-2 btn btn-primary px-8 py-2">
                Bilgileri Güncelle
            </button>
            <a href="{{ route('dashboard.skill_categories.index') }}" class="btn btn-secondary">Geri Dön</a>
        </div>
    </form>
</div>
@endsection