@section('title', 'BÖLÜM DETAYLARI')
@extends('dashboard.layout')

@section('content')
<div class="container py-4">
    <div class="card shadow">
        <div class="card-body p-5">
            <h1 class="title mb-4">{{ $major->name }}</h1>

            <div class="d-flex gap-3 mb-4">
                <div class="p-2 border rounded içerik">
                    <span class="thead">Eğitim Dili:</span> {{ $major->education_language }}
                </div>

                <div class="p-2 border rounded içerik">
                    <span class="thead">Derece:</span> {{ $major->degree_type }}
                </div>
            </div>

            <hr>

            <div class="mt-4">
                <div class="p-4 border-start border-4 border-primary  shadow-sm"
                    style="font-size: 1.2rem; line-height: 1.8;">
                    {{-- veri tabanında depolanan açıklama görüntülenir --}}
                    {!! nl2br(e($major->description)) !!}
                </div>
            </div>

            {{-- düğmeye basılınca üniversitelerin isimleri görüntülenir --}}
            <div class="mt-5">
                <button class="btn btn-lg px-5" type="button" data-bs-toggle="collapse"
                    data-bs-target="#uniCollapse">
                    Bu Bölümü Sunan Üniversiteleri Gör
                </button>
            </div>

            <div class="collapse mt-4" id="uniCollapse">
                <div class="row">
                    @forelse($major->universities as $university)
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 p-3 d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="fw-bold">{{ $university->name }}</h5>
                                <p class="mb-2 small">Ücret: ${{ $university->pivot->tuition_usd }}</p>
                            </div>

                            {{-- üniversiteler sayfasına götüren buton --}}
                            <div class="mt-2 text-end">
                                <a href="{{ route('dashboard.universities.show', $university->id) }}"
                                    class="btn detayuni">
                                    Üniversite Detayları
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-center">Kayıtlı üniversite bulunamadı.</p>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="card-footer p-2  text-end">
            <a href="{{ url()->previous() }}" class="btn btn-secondary mt-2 me-2">Geri Dön</a>
        </div>
    </div>
</div>
@endsection