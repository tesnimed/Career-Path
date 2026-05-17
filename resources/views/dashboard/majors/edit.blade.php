@section('title', 'BÖLÜM DÜZENLE')
@extends('dashboard.layout')

@section('content')
<div class="container mt-2">
    <div class="card shadow-lg">
        <div class="card-body p-5">

            <h2 class="text-2xl title mb-5">
                Bölümü Düzenle: {{ data_get($major, 'name') }}
            </h2>

            <form action="{{ route('dashboard.majors.update', data_get($major, 'id')) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Bölüm Adı --}}
                <div class="mb-4">
                    <label class="p-2 thead d-block">Bölüm Adı:</label>
                    <input
                        type="text"
                        name="name"
                        class="form-control border rounded w-full"
                        value="{{ old('name', data_get($major, 'name')) }}"
                        required
                    >
                </div>

                {{-- Eğitim Dili --}}
                <div class="mb-4">
                    <label class="p-2 thead d-block">Eğitim Dili:</label>
                    <select name="education_language" class="w-full border rounded p-2">
                        <option value="TR"
                            {{ old('education_language', data_get($major, 'education_language')) === 'TR' ? 'selected' : '' }}>
                            Türkçe (TR)
                        </option>
                        <option value="EN"
                            {{ old('education_language', data_get($major, 'education_language')) === 'EN' ? 'selected' : '' }}>
                            İngilizce (EN)
                        </option>
                    </select>
                </div>

                {{-- Derece Türü --}}
                <div class="mb-4">
                    <label class="p-2 thead d-block">Derece Türü:</label>
                    <select name="degree_type" class="w-full border rounded p-2">
                        <option value="lisans"
                            {{ old('degree_type', data_get($major, 'degree_type')) === 'lisans' ? 'selected' : '' }}>
                            Lisans (4 Yıl)
                        </option>
                        <option value="on_lisans"
                            {{ old('degree_type', data_get($major, 'degree_type')) === 'on_lisans' ? 'selected' : '' }}>
                            Ön Lisans (2 Yıl)
                        </option>
                    </select>
                </div>

                {{-- Açıklama --}}
                <div class="mb-4">
                    <label class="p-2 thead d-block">Açıklama:</label>
                    <textarea
                        name="description"
                        rows="3"
                        class="form-control border rounded w-full"
                    >{{ old('description', data_get($major, 'description')) }}</textarea>
                </div>

                <div class="mt-4">
                    <button type="submit" class="güncel1 btn btn-primary px-8 py-2">
                        Bilgileri Güncelle
                    </button>

                    <a href="{{ route('dashboard.universities.index') }}" class="btn btn-secondary">
                        Geri Dön
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection