@section('title','BÖLÜM_DETAYLARI')

@extends('layouts.app')

@section('content')
<div class="uni container-fluid py-4">
    <div class="card shadow-lg  d-flex flex-column">
        <div class="card-body p-5">
            <h1 class="title  mb-4">{{ $major->name }}</h1>

            <div class="d-flex gap-3 mb-4">
                <div class="p-2 border rounded bg-light">
                    <strong class="thead">Eğitim Dili:</strong>
                    <span class="badge fs-6 me-2">{{ $major->education_language }}</span>
                </div>

                <div class="p-2 border rounded bg-light">
                    <strong class="thead">Derece:</strong>
                    <span class="badge fs-6 me-2">{{ $major->degree_type }}</span>
                </div>
            </div>

            <hr>

            <div class="mt-4">
                <div class="p-4 border-start border-4 border-primary bg-white shadow-sm"
                    style="font-size: 1.2rem; line-height: 1.8;">
                    {{-- عرض الشرح كما هو مخزن في الداتابيز --}}
                    {!! nl2br(e($major->description)) !!}
                </div>
            </div>

            {{-- الزر الذي يظهر الجامعات عند الضغط عليه --}}
            <div class="mt-5">
                <button class="btn btn-warning btn-lg px-5 py-3 shadow" type="button" data-bs-toggle="collapse"
                    data-bs-target="#uniCollapse">
                    Bu Bölümü Sunan Üniversiteleri Gör
                </button>
            </div>

            <div class="collapse mt-4" id="uniCollapse">
                <div class="row">
                    @forelse($major->universities as $university)
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 p-3 border-warning shadow-sm d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="fw-bold">{{ $university->name }}</h5>
                                <p class="text-muted mb-2 small">Ücret: ${{ $university->pivot->tuition_usd }}</p>
                            </div>

                            <div class="mt-2 text-end">
                                <a href="{{ route('university_details', $university->id) }}"
                                    class="detayuni btn btn-sm btn-outline-warning">
                                    Üniversite Detayları
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-center text-muted">Kayıtlı üniversite bulunamadı.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection