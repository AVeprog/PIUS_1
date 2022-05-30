@extends('layouts.main')
@section('content')
<div>
    <div>
        @foreach($posts as $post)
        <div><a href="{{ route('post.show', $post->id) }}"> {{ $post->id }}.{{ $post->name }}</div>
        @endforeach

        <div class="mt-3">
            {{ $posts->withQueryString()->links("pagination::bootstrap-4") }}
        </div>
    </div>
    @endsection