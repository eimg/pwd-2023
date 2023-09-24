@extends('layouts.app')
@section('content')
    <div class="container" style="max-width: 800px">

        @if($errors->any())
            <div class="alert alert-warning">
                @foreach($errors->all() as $err)
                    {{ $err }}
                @endforeach
            </div>
        @endif

        <form method="post">
            @csrf
            <div class="mb-2">
                <label>Title</label>
                <input type="text" class="form-control" name="title"
                    value="{{ $article->title }}">
            </div>
            <div class="mb-2">
                <label>Body</label>
                <textarea name="body" class="form-control">{{ $article->body }}</textarea>
            </div>
            <div class="mb-4">
                <label>Category</label>
                <select name="category_id" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            @if($article->category_id == $category->id)
                                selected
                            @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary">Update Article</button>
        </form>
    </div>
@endsection
