@section('title', 'TÜM UNİVERSİTELER')
@extends('dashboard.layout')

@section('content')
<div class="container mt-2 px-2">
    <div class="card shadow-lg col-12 p-0">
        <div class="card-body p-4 d-flex flex-column flex-sm-row justify-content-between align-items-center gap-3">
            <h2 class="text-xl title m-0">Üniversite Listesi</h2>
            <a href="{{ route('dashboard.universities.create') }}" class="ekle btn px-4 py-2 text-nowrap">Yeni Üniversite Ekle</a>
        </div>

        <div class="table-responsive px-3 pb-3">
            <table class="table table-hover align-middle min-w-full m-0">
                <thead>
                    <tr class="text-nowrap">
                        <th class="thead px-3 py-3 text-center" style="width: 5%">ID</th>
                        <th class="thead px-3 py-3 text-center uppercase" style="width: 35%">Üniversite Adı</th>
                        <th class="thead px-3 py-3 text-center uppercase" style="width: 15%">Tür</th>
                        <th class="thead px-3 py-3 text-center uppercase" style="width: 15%">Konum</th>
                        <th class="thead px-3 py-3 text-center uppercase" style="width: 30%">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($universities as $uni)
                    <tr>
                        <td class="px-3 py-3 text-center fw-bold">{{ $uni->id }}</td>
                        <td class="px-3 py-3 text-center">
                            <div class="fw-semibold text-wrap" style="max-width: 200px; margin: 0 auto;">{{ $uni->name }}</div>
                        </td>
                        <td class="px-3 py-3 text-center uppercase">
                            <span class="badge bg-light text-dark border px-2 py-1">
                                {{ strtoupper($uni->type) }}
                            </span>
                        </td>
                        <td class="px-3 py-3 text-center text-nowrap">
                            {{ $uni->district }} / {{ $uni->side }}
                        </td>
                        <td class="px-3 py-3 text-center">
                            <div class="d-flex flex-wrap justify-content-center gap-1">
                                <a href="{{ route('dashboard.universities.show', $uni->id) }}" 
                                   class="detay btn btn-sm px-3 py-1">Detay</a>
                                <a href="{{ route('dashboard.universities.edit', $uni->id) }}" 
                                   class="düzenle btn btn-sm px-3 py-1">Düzenle</a>
                                <form action="{{ route('dashboard.universities.destroy', $uni->id) }}" method="POST" class="m-0 inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="sil-uni btn btn-sm px-3 py-1" 
                                            onclick="return confirm('Emin misiniz?')">Sil</button>
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