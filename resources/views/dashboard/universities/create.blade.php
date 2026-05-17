@section('title', 'ÜNİVERSİTE KAYIT')

@extends('dashboard.layout')

@section('content')
<div class="container mt-3 mb-3">
    <div class="card shadow-lg mb-3 mt-3">
        <div class="card-body p-5">
            <h2 class="text-xl title mb-5">Yeni Üniversite Kaydı</h2>
            <form action="{{ route('dashboard.universities.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <div><label class="mb-2 thead me-3">Üniversite Adı:</label><input type="text" name="name_tr"
                            class="border rounded outline-none"></div>
                </div>
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <div><label class="mb-2 thead me-3">Tür</label><select name="type"
                            class="w-full border rounded">
                            <option value="devlet">Devlet</option>
                            <option value="vakif">Vakıf (Özel)</option>
                        </select></div>
                    <div><label class="mb-2 thead me-3">İlçe</label><input type="text" name="district"
                            class="w-full border rounded"></div>
                    <div><label class=" thead me-3">Yaka</label><select name="side"
                            class="w-full border rounded">
                            <option value="Avrupa">Avrupa</option>
                            <option value="Anadolu">Anadolu</option>
                        </select></div>
                </div>
                <div class="mb-3">
                    <label class="mb-2 thead me-3 ">Eğitim Dilleri</label>
                    <div class="w-full  rounded">
                        <label><input type="checkbox" name="education_languages[]" value="TR"> Türkçe</label>
                        <label><input type="checkbox" name="education_languages[]" value="EN"> İngilizce</label>
                    </div>
                </div>
                <button type="submit" class="kaydet btn px-8 py-2 rounded">Üniversiteyi Kaydet</button>
                <a href="{{ route('dashboard.universities.index') }}" class="iptal btn py-2 me-3">İptal</a>
            </form>
        </div>
        @endsection