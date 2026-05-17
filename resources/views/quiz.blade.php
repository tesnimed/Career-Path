@extends('layouts.app')
@section('title','Becerilerin Testi')
@section('content')
<div class="container">
    <h3 class="title quiz-title mb-4">Yeteneklerinizi/İlgi alanlarınızı seçin</h3>
    <form method="POST" action="{{ route('quiz_results.submit') }}" id="quizForm">@csrf
        <div class="row">
            @foreach($skills as $skill)
            <div class="col-md-4 mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="skills[]" value="{{ $skill->id }}"
                        id="sk{{ $skill->id }}">
                    <label class="form-check-label" for="sk{{ $skill->id }}">{{ $skill->name }}</label>
                </div>
            </div>
            @endforeach
        </div>
        <button type="submit" class="btn quiz-btn mt-4">
            Sonuçları Görüntüle
        </button>
    </form>
</div>

@section('scripts')
<script>
document.getElementById('quizForm').addEventListener('submit', function(e) {
    if (!document.querySelectorAll('input[name="skills[]"]:checked').length) {
        e.preventDefault();
        alert('En az bir beceri seçin');
    }
});
</script>
@endsection
@endsection