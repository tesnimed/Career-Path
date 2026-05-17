@section('title', 'BÖLÜM KAYIT')
@extends('dashboard.layout')

@section('content')
<div class="container mt-2">
    <div class="card shadow-lg">
        <div class="card-body p-5">
            <h2 class="text-xl title p-3">Yeni Bölüm Kayıt Formu</h2>
            <form action="{{ route('dashboard.majors.store') }}" method="POST">
                @csrf
                <div>
                    <div><label class="p-2 thead">Bölüm Adı:</label>
                        <input type="text" name="name" class="border rounded outline-none" required>
                    </div>
                </div>
                <div>
                    <label class="p-2 thead">Eğitim Dili:</label>
                    <select name="degree_type" class="w-full border rounded">
                        <option class="içerik" value="education_languages">TR</option>
                        <option class="içerik" value="education_languages">EN</option>
                    </select>
                </div>
                <div>
                    <label class="p-2 thead">Derece Türü:</label>
                    <select name="degree_type" class="w-full border rounded">
                        <option class="içerik" value="lisans">Lisans (4 Yıl)</option>
                        <option class="içerik" value="on_lisans">Ön Lisans (2 Yıl)</option>
                    </select>
                </div>
                <div>
                    <div><label class="p-2 thead">Açıklama:</label><br>
                        <textarea name="description" rows="3" class="mb-2 border rounded outline-none"></textarea>
                    </div>
                </div>
                <button type="submit" class="kaydet btn px-8 py-2 rounded">Bölümü Kaydet</button>
                <a href="{{ route('dashboard.majors.index') }}" class="iptal btn py-2 me-3">İptal</a>
            </form>
        </div>
    </div>
</div>
@endsection