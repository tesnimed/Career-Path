@extends('layouts.app')
@section('title','YENİ KAYIT')
@section('content')
<div class="box2 row justify-content-center">
  <div class="col-md-6">
    <div class="card p-5 shadow-lg">
      <h1 class="title text-center mb-4 mt-4">Yeni Hesap Kaydı</h1>
      @if($errors->any())
        <div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
      @endif
      <form method="POST" action="{{ url('/register') }}">
        @csrf
        <input type="text" name="name" class="form-control mb-4" placeholder="Ad Soyad" value="{{ old('name') }}">
        <input type="email" name="email" class="form-control mb-4" placeholder="E-posta" value="{{ old('email') }}">
        <input type="password" name="password" class="form-control mb-4" placeholder="Şifre">
        <input type="password" name="password_confirmation" class="form-control mb-4" placeholder="Şifreyi Onayla">
        <button class="btn w-100 mb-4">Kayıt Ol</button>
      </form>
    </div>
  </div>
</div>
@endsection
