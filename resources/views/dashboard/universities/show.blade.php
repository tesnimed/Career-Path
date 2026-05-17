@section('title','ÜNİVERSİTE DETAYLARI')
@extends('dashboard.layout')

@section('content')
<div class="container py-4">
    <div class="card shadow">
        <div class="card-body p-5">
            <h2 class="title">{{ $university->name }}</h2>
        </div>
        <div class="card-body p-3">
            <h3 class="thead">Hakkında:</h3>
            <p class="içerik">{{ $university->description }}</p>

            <hr>

            <div class="row">
                <div class="col-md-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><span class="thead">Tür : </span><span class="içerik"> {{ $university->type == 'devlet' ? 'Devlet ' : 'Vakıf' }} </span></li>
                        <li class="list-group-item"><span class="thead">İlçe : </span><span class="içerik"> {{ $university->district }} </span></li>
                        <li class="list-group-item"><span class="thead">Yaka : </span><span class="içerik"> {{ $university->side }} </span></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><span class="thead">Eğitim Dilleri : <br></span>
                                    @foreach($university->education_languages as $lang)
                            <span class="badge fs-6 me-2 mt-3">{{ strtoupper($lang) }}</span>
                            @endforeach
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="card-footer p-2  text-end">
            <a href="{{ url()->previous() }}" class="btn btn-secondary mt-2 me-2">Geri Dön</a>
        </div>
    </div>
</div>
@endsection