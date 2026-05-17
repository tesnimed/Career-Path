@section('title', 'TÜM KULANICILAR')

@extends('dashboard.layout')

@section('content')
<div class="container mt-2">
    <div class="card shadow-lg">
        <div class="card-body p-5">
            <h3 class="text-xl title">Sistemdeki Kullanıcılar</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center table-striped">
                <thead class="min-w-full">
                    <tr>
                        <th class="thead px-5 py-3 uppercase">ID</th>
                        <th class="thead px-5 py-3 uppercase">İsim</th>
                        <th class="thead px-5 py-3 uppercase">E-posta</th>
                        <th class="thead px-5 py-3 uppercase">Kayıt Tarihi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td class="içerik">{{ $user->id }}</td>
                        <td class="içerik">{{ $user->name }}</td>
                        <td class="içerik">{{ $user->email }}</td>
                        <td class="içerik">{{ $user->created_at->format('Y-m-d') }}</td>
                        <td>
                    <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-sm userbtn1">
                        Düzenle
                    </a>
                    
                    <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm userbtn2" onclick="return confirm('Emin misiniz?')">
                            Sil
                        </button>
                    </form>
                </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Henüz kullanıcı bulunamad</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection