@section('title', 'TÜM KULLANICILAR')

@extends('dashboard.layout')

@section('content')
<div class="card-box mt-4">
    <div class="card shadow-lg p-3 border-1">
        
        <div class="card-body p-3">
            <h2 class="text-xl title m-0 mb-3" style="font-size: 28px;">Sistemdeki Kullanıcılar</h2>
        </div>
        
        <div class="table-responsive" style="width: 100%; overflow-x: auto; display: block; -webkit-overflow-scrolling: touch;">
            <table class="table table-hover align-middle m-0" style="min-width: 550px; table-layout: fixed; width: 100%;">
                <thead>
                    <tr class="text-nowrap">
                        <th class="thead p-2 text-center" style="width: 10%">ID</th>
                        <th class="thead p-2 text-center" style="width: 35%;">İsim</th>
                        <th class="thead p-2 text-center" style="width: 50%">E-posta</th>
                        <th class="thead p-2 text-center" style="width: 20%">Kayıt Tarihi</th>
                        <th class="thead p-2 text-center" style="width: 20%">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users ?? [] as $user)
                    <tr>
                        <td class="p-2 text-center fw-bold">{{ $user->id }}</td>
                        <td class="p-2 text-center text-muted">{{ $user->name ?? 'careerpath' }}</td>
                        <td class="p-2 text-center">
                            <div class="text-break fw-semibold px-1" style="font-size: 14px; word-break: break-all;">
                                {{ $user->email }}
                            </div>
                        </td>
                        <td class="p-2 text-center text-nowrap text-muted" style="font-size: 14px;">
                            {{ $user->created_at ? $user->created_at->format('Y-m-d') : '2026-05-20' }}
                        </td>
                        <td class="p-2 text-center">
                            <div class="d-flex flex-row flex-sm-wrap justify-content-center gap-1">
                                <a href="#" class="düzenle btn btn-sm px-2 py-1 text-nowrap" style="font-size: 13px;">Düzenle</a>
                                <form action="#" method="POST" class="m-0 inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="sil-uni btn btn-sm px-2 py-1 text-nowrap" style="font-size: 13px;" onclick="return confirm('Emin misiniz?')">Sil</button>
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
