@extends('layouts.app')
@section('title','投稿一覧')

@section('content')

    @if(session('flash_message'))
        <p class="text-success">{{session('flash_message')}}</p>
    @endif

    <div class="mb-2">
        <a href="{{ route('posts.create')}}" class="text-decoration-none">新規登録</a>
    </div>
     @foreach($posts as $post)
        <div class="card mb-3">
            <div class="cord-body">
                <h2 class="cord-title fs5">{{ $post->title}}</h2>
                <p class="cord-text">{{ $post->content}}</p>
            <div class="d-flex">
                <a href="{{ route('posts.show',$post)}}" class="btn btn-outline-primary d-block me-1">詳細</a>
                <a href="{{ route('posts.edit',$post)}}" class="btn btn-outline-primary d-block me-1">編集</a>

                <form action="{{ route('posts.destroy', $post)}}" method="post">
                     @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-outline-danger">削除</button>
                </form>
            </div>
            </div>
        </div>          
    @endforeach
@endsection