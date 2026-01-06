@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Summarize Text with ChatGPT</h2>
    <form method="POST" action="/summary">
        @csrf
        <div class="form-group">
            <label for="user_content">Enter your text:</label>
            <textarea name="user_content" id="user_content" class="form-control" rows="6">{{ old('user_content', $user_content ?? '') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Summarize</button>
    </form>

    @if(isset($summary))
        <div class="mt-4">
            <h4>Summary:</h4>
            <div class="alert alert-info">{{ $summary }}</div>
        </div>
    @endif
</div>
@endsection
