@extends('layout')

@section('content')
    <form class="edit" action="/api/article/update/{{ $article->id }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="text" name="title" value="{{ $article->title }}">
        <textarea name="content" rows="8" cols="80">
            {{ $article->content }}
        </textarea>
        <button type="submit" name="button">更新</button>
    </form>
@endsection
