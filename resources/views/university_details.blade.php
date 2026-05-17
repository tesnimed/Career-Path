@extends('layouts.app', ['hide_sidebar' => true])
@section('title','ÜNİVERSİTE_DETAYLARI')

@section('content')
<div class="container uni2">
    <div class="card shadow-lg  d-flex flex-column ">
        <div class="card-header p-5">
            <h2 class="title">{{ $university->name }}</h2>
        </div>
        <div class="card-body p-3">
            <h3 >Hakkında:</h3>
            <p>{{ $university->description }}</p>

            <hr>

            <div class="row">
                <div class="col-md-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Tür : </strong> {{ $university->type == 'devlet' ? 'Devlet ' : 'Vakıf' }}</li>
                        <li class="list-group-item"><strong>İlçe : </strong> {{ $university->district }}</li>
                        <li class="list-group-item"><strong>Yaka : </strong> {{ $university->side }}</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Eğitim Dilleri : <br></strong>
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