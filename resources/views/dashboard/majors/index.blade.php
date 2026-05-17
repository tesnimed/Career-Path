@section('title', 'TÜM BÖLÜMLER')
@extends('dashboard.layout')
@section('content')
<div class="box row justify-content-center mt-2">
    <div class="card shadow-lg ">
        <div class="card-body p-5 col-md-12">
            <h2 class="text-xl title p-2 mb-5">Tüm Bölümler</h2>
            <div>
                <a href="{{ route('dashboard.majors.create') }}" class="ekle btn px-8 py-2">Yeni Bölüm Ekle</a>
            </div>
        </div>

        <div class="shadow ">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="thead px-5 py-3 text-center">ID</th>
                        <th class="thead px-5 py-3 text-center uppercase">Bölüm Adı</th>
                        <th class="thead px-5 py-3 text-right uppercase">Derece</th>
                        <th class="thead px-5 py-3 text-right uppercase">Eğitim Dilleri</th>
                        <th class="thead px-5 py-3 text-center uppercase">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($majors as $major)
                    <tr>
                        <td class="px-5 py-4 text-center">{{ $major->id }}</td>
                        <td class="px-5 py-4 text-center">
                            <div>{{ $major->name}}</div>
                        </td>
                        <td class="px-5 py-4 text-right uppercase">
                            <span class="px-2">
                                {{ str_replace('_', ' ', $major->degree_type) }}
                            </span>
                        </td>
                        <td class="px-5 py-4 text-right uppercase">
                            <span class="px-2">
                                {{ str_replace('_', ' ', $major->education_language) }}
                            </span>
                        </td>
                        <td class="px-5 py-4 text-center">
                            <a href="{{ route('dashboard.majors.show', $major->id) }}"
                                class="detay btn px-8 py-2">Detayları Gör</a>
                            <a href="{{ route('dashboard.majors.edit', $major->id) }}"
                                class="düzenle btn px-8 py-2">Düzenle</a>
                            <div>
                                <form action="{{ route('dashboard.majors.destroy', $major->id) }}" method="POST"
                                    class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="sil-uni btn px-8 py-2"
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