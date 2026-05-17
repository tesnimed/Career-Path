@section('title', 'BECERİ DÜZENLE')

@extends('dashboard.layout')

@section('content')
<div class="container mt-4 card shadow-lg p-4">
    <h2 class="text-xl title p-5 border-bottom mb-4">Yetenek Güncelle</h2>
    <form action="{{ route('dashboard.skills.update', $skill->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-4">
            <label class="block thead mb-2 me-3">Kategori</label>
            <select name="category_id" class="w-full border rounded p-2 içerik">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @selected($skill->category_id == $cat->id)>{{ $cat->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-5">
            <label class="block thead mb-2 me-3">Yetenek Adı</label>
            <input type="text" name="name" value="{{ $skill->name }}" class="w-full border rounded p-2 içerik">
        </div>
        <button type="submit" class="güncel mb-2 btn btn-primary px-8 py-2">Bilgileri Güncelle</button>
        <a href="{{ route('dashboard.skills.index') }}" class="btn btn-secondary">Geri Dön</a>
    </form>
</div>

@endsection