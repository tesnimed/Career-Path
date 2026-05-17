@section('title', 'ÜNİVERSİTE DÜZENLE')

@extends('dashboard.layout')
@section('content')
<div class="container mt-4 card shadow-lg p-4">
    
    <h2 class="text-xl title p-2 border-bottom mb-4">Bilgileri Güncelle: {{ $university->name_tr }}</h2>
    
    <form action="{{ route('dashboard.universities.update', $university->id) }}" method="POST">
        @csrf 
        @method('PUT')


        <div class="mb-4">
            <label class="thead form-label fw-bold">Üniversite Adı</label>
            <input type="text" name="name_tr" class="form-control içerik" 
                   value="{{ old('name', $university->name) }}" 
                   placeholder="Üniversite adını giriniz">
        </div>

        <div class="mb-4">
            <label class="thead form-label fw-bold">Hakkında (Açıklama)</label>
            <textarea name="description" class="form-control içerik" rows="4" placeholder="Üniversite hakkında bilgi giriniz...">{{ old('description', $university->description) }}</textarea>
        </div>

        <div class="row">
            <div class="col-md-4 mb-4">
                <label class="thead form-label fw-bold">Tür</label>
                <select name="type" class="form-control içerik">
                    <option value="Vakıf" {{ $university->type == 'Vakıf' ? 'selected' : '' }}>Vakıf</option>
                    <option value="Devlet" {{ $university->type == 'Devlet' ? 'selected' : '' }}>Devlet</option>
                </select>
            </div>

            <div class="col-md-4 mb-4">
                <label class="thead form-label fw-bold">İlçe</label>
                <input type="text" name="district" class="form-control içerik" value="{{ old('district', $university->district) }}" placeholder="Örn: Beşiktaş">
            </div>

            <div class="col-md-4 mb-4">
                <label class="thead form-label fw-bold">Yaka</label>
                <select name="side" class="form-control içerik">
                    <option value="Avrupa" {{ $university->side == 'Avrupa' ? 'selected' : '' }}>Avrupa</option>
                    <option value="Anadolu" {{ $university->side == 'Anadolu' ? 'selected' : '' }}>Anadolu</option>
                </select>
            </div>
        </div>

        <div class="mb-4">
            <strong class="thead d-block mb-2">Eğitim Dilleri</strong>
            <div class="p-3 border rounded d-flex">
                <label class="flex items-center mx-3">
                    <input type="checkbox" name="education_languages[]" value="TR"
                        @checked(collect($university->education_languages)->contains('TR'))>
                    <span class="ml-2 içerik">Türkçe</span>
                </label>

                <label class="flex items-center mx-3">
                    <input type="checkbox" name="education_languages[]" value="EN" 
                        @checked(collect($university->education_languages)->contains('EN'))>
                    <span class="ml-2 içerik">İngilizce</span>
                </label>
            </div>
        </div>

        <div class="mt-6 border-top pt-3">
            <button type="submit" class="güncel mb-2 btn btn-primary px-8 py-2">
                Bilgileri Güncelle
            </button>
            <a href="{{ route('dashboard.universities.index') }}" class="btn btn-secondary">Geri Dön</a>
        </div>
    </form>
</div>
@endsection