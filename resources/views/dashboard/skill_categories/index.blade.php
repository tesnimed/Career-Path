@section('title', 'TÜM BECERİ KATEGORİLERİ')

@extends('dashboard.layout')

@section('content')
<div class="container mt-2 px-2">
    <div class="card shadow-lg col-12 p-0">
        <div class="card-body p-4 d-flex flex-column flex-sm-row justify-content-between align-items-center gap-3">
            <h2 class="text-xl title m-0">Yetenek Kategorileri</h2>
            <a href="{{ route('dashboard.skill_categories.create') }}" class="ekle btn px-4 py-2 text-nowrap">Yeni Kategori Ekle</a>
        </div>

        <div class="table-responsive px-3 pb-3">
            <table class="table table-hover align-middle min-w-full m-0">
                <thead>
                    <tr class="text-nowrap">
                        <th class="thead px-3 py-3 text-center" style="width: 5%">ID</th>
                        <th class="thead px-3 py-3 text-center uppercase" style="width: 32.5%">Kategori Adı (TR)</th>
                        <th class="thead px-3 py-3 text-center uppercase" style="width: 32.5%">Kategori Adı (EN)</th>
                        <th class="thead px-3 py-3 text-center uppercase" style="width: 30%">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td class="px-3 py-3 text-center fw-bold">{{ $category->id }}</td>
                        <td class="px-3 py-3 text-center">
                            <div class="fw-semibold text-wrap" style="max-width: 180px; margin: 0 auto;">{{ $category->name_tr ?? $category->name }}</div>
                        </td>
                        <td class="px-3 py-3 text-center">
                            <div class="text-muted text-wrap" style="max-width: 180px; margin: 0 auto;">{{ $category->name_en ?? $category->name }}</div>
                        </td>
                        <td class="px-3 py-3 text-center">
                            <div class="d-flex flex-wrap justify-content-center gap-1">
                                <a href="{{ route('dashboard.skill_categories.show', $category->id) }}" class="detay btn btn-sm px-3 py-1">Detay</a>
                                <a href="{{ route('dashboard.skill_categories.edit', $category->id) }}" class="düzenle btn btn-sm px-3 py-1">Düzenle</a>
                                <form action="{{ route('dashboard.skill_categories.destroy', $category->id) }}" method="POST" class="m-0 inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="sil-uni btn btn-sm px-3 py-1" onclick="return confirm('Silmek istediğinize emin misiniz?')">Sil</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection