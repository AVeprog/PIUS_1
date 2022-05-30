@extends('layouts.main')
@section('content')
<div>
    <div>{{ $post->id }} . {{ $post->name }}</div>
    <div>Content: {{ $post->content }}</div>
    <div>Charcode: {{ $post->charcode }}</div>
    <div>Author: {{ $post->author }}</div>
    <div>Created at: {{ $post->created_at }}</div>
</div>
<div>
    <ul class="list-group mt-3">
        <div>Tags</div>
        @foreach($tags as $tag)
        <li class="list-group-item" value="{{ $tag->id }}">{{ $tag->name }}</li>
        @endforeach
    </ul>
</div>
@endsection