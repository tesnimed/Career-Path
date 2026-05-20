@section('title', 'TÜM BÖLÜMLER')
@extends('dashboard.layout')
@section('content')
<div class="box row justify-content-center mt-2 px-2">
    <div class="card shadow-lg col-12 col-md-11 p-0">
        <div class="card-body p-4 d-flex flex-column flex-sm-row justify-content-between align-items-center gap-3">
            <h2 class="text-xl title m-0">Tüm Bölümler</h2>
            <a href="{{ route('dashboard.majors.create') }}" class="ekle btn px-4 py-2 text-nowrap">Yeni Bölüm Ekle</a>
        </div>

        <div class="table-responsive px-3 pb-3">
            <table class="table table-hover align-middle min-w-full m-0">
                <thead>
                    <tr class="text-nowrap">
                        <th class="thead px-3 py-3 text-center" style="width: 5%">ID</th>
                        <th class="thead px-3 py-3 text-center uppercase" style="width: 35%">Bölüm Adı</th>
                        <th class="thead px-3 py-3 text-center uppercase" style="width: 15%">Derece</th>
                        <th class="thead px-3 py-3 text-center uppercase" style="width: 15%">Eğitim Dilleri</th>
                        <th class="thead px-3 py-3 text-center uppercase" style="width: 30%">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($majors as $major)
                    <tr>
                        <td class="px-3 py-3 text-center fw-bold">{{ $major->id }}</td>
                        <td class="px-3 py-3 text-center">
                            <div class="fw-semibold text-wrap" style="max-width: 180px; margin: 0 auto;">{{ $major->name }}</div>
                        </td>
                        <td class="px-3 py-3 text-center uppercase">
                            <span class="badge bg-light text-dark border px-2 py-1">
                                {{ str_replace('_', ' ', $major->degree_type) }}
                            </span>
                        </td>
                        <td class="px-3 py-3 text-center uppercase">
                            <span class="badge bg-light text-dark border px-2 py-1">
                                {{ str_replace('_', ' ', $major->education_language) }}
                            </span>
                        </td>
                        <td class="px-3 py-3 text-center">
                            <div class="d-flex flex-wrap justify-content-center gap-1">
                                <a href="{{ route('dashboard.majors.show', $major->id) }}"
                                    class="detay btn btn-sm px-3 py-1">Detay</a>
                                <a href="{{ route('dashboard.majors.edit', $major->id) }}"
                                    class="düzenle btn btn-sm px-3 py-1">Düzenle</a>
                                <form action="{{ route('dashboard.majors.destroy', $major->id) }}" method="POST" class="m-0 inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="sil-uni btn btn-sm px-3 py-2"
                                        onclick="return confirm('Silmek istediğinize emin misiniz?')">Sil</button>
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