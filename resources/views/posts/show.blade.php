@extends('posts.layout')

@section('title', $post->title)

@section('content')
<style>
    .post-container {
        background-color: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .post-header {
        border-bottom: 2px solid #f1f1f1;
        padding-bottom: 20px;
        margin-bottom: 30px;
    }
    .post-header h2 {
        margin-bottom: 10px;
        color: #2c3e50;
    }
    .post-meta {
        color: #6c757d;
        font-size: 14px;
    }
    .post-content {
        line-height: 1.8;
        margin-bottom: 30px;
        white-space: pre-wrap;
    }
    .post-actions {
        display: flex;
        gap: 10px;
        padding-top: 20px;
        border-top: 2px solid #f1f1f1;
    }
</style>

<div class="post-container">
    <div class="post-header">
        <h2>{{ $post->title }}</h2>
        <div class="post-meta">
            작성일: {{ $post->created_at->format('Y-m-d H:i') }}
            @if($post->updated_at != $post->created_at)
                | 수정일: {{ $post->updated_at->format('Y-m-d H:i') }}
            @endif
        </div>
    </div>
    
    <div class="post-content">
        {{ $post->content }}
    </div>
    
    <div class="post-actions">
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">목록</a>
        <a href="{{ route('posts.edit', $post) }}" class="btn">수정</a>
        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;" onsubmit="return confirm('정말 삭제하시겠습니까?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">삭제</button>
        </form>
    </div>
</div>
@endsection
