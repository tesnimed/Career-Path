@section('title', 'BECERİ KAYIT')

@extends('dashboard.layout')

@section('content')
<div class="container mt-3 mb-3">
    <div class="card shadow-lg mb-3 mt-3">
        <div class="card-body p-5">
    <h2 class="text-xl title mb-5">Yeni Yetenek Kaydet</h2>
    <form action="{{ route('dashboard.skills.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="mb-2 thead">Kategori:</label><br><br>
            <select name="category_id" class="border rounded p-2  outline-none" required>
                <option value="skill_categories">Bir kategori seçin</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" class="içerik">{{ $cat->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-5">
            <label class="mb-2 thead">Yetenek Adı:</label><br><br>
            <input type="text" name="name" class="border içerik rounded p-2 outline-none" placeholder="Örn: PHP" required>
        </div>
            <button type="submit" class="kaydet btn px-8 py-2 rounded">Yetenek Kaydet</button>
            <a href="{{ route('dashboard.skills.index') }}" class="iptal btn py-2 me-3">İptal</a>
    </form>
    </div>
    </div>
</div>
@endsection