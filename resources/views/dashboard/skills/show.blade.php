@section('title', 'BECERİ DETAYLARI')

@extends('dashboard.layout')

@section('content')
<div class="container py-4">
    <div class="card shadow p-5">
    <h2 class="title mb-4">Yetenek Bilgisi</h2>
    <div class="space-y-3">
        <p class="py-1"><span class="thead">Adı: </span><span class="içerik">{{ $skill->name }}</p></span>
        <p class="py-1"><span class="thead">Kategori: </span><span class="içerik">{{ $skill->category->name }}</p></span>
    </div>
        <div class="card-footer p-2  text-end">
            <a href="{{ url()->previous() }}" class="btn btn-secondary mt-2 me-2">Geri Dön</a>
        </div>
    </div>
</div>
@endsection