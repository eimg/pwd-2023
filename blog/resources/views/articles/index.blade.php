@extends('layouts.app')
@section('content')
    <div class="container" style="max-width: 800px">
        {{ $articles->links() }}

        @if(session("info"))
            <div class="alert alert-info">
                {{ session("info") }}
            </div>
        @endif

        @foreach ($articles as $article)
            <div class="card mb-3">
                <div class="card-body">
                    <h2 class="h4 card-title">
                        {{ $article->title }}
                    </h2>
                    <small class="text-muted">
                        <b class="text-success">{{ $article->user->name }}</b>,
                        <b>Category:</b>
                        <span class="text-primary">
                            {{ $article->category->name }}
                        </span>,
                        <b>Comments:</b> {{ count($article->comments) }},
                        {{ $article->created_at->diffForHumans() }}
                    </small>
                    <div>
                        {{ $article->body }}
                    </div>
                    <div class="mt-1">
                        <a href="{{ url("/articles/detail/$article->id") }}" class="card-link">View Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
