@extends('layouts.app')

@section('content')
<div class="container">
    <h2>AI Summarization Services</h2>
    <ul class="list-group">
        <li class="list-group-item"><a href="/summary/openai">Summarize with OpenAI</a></li>
        <li class="list-group-item"><a href="/summary/claude">Summarize with Claude</a></li>
        <li class="list-group-item"><a href="/summary/gemini">Summarize with Gemini</a></li>
        <li class="list-group-item"><a href="/summary/grok">Summarize with Grok</a></li>
    </ul>
</div>
@endsection
