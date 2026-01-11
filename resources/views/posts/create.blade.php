@extends('posts.layout')

@section('title', '게시글 작성')

@section('content')
<style>
    .form-container {
        background-color: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .form-group {
        margin-bottom: 20px;
    }
    label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #333;
    }
    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
        font-family: inherit;
    }
    input[type="text"]:focus,
    textarea:focus {
        outline: none;
        border-color: #007bff;
    }
    textarea {
        min-height: 300px;
        resize: vertical;
    }
    .error {
        color: #dc3545;
        font-size: 13px;
        margin-top: 5px;
    }
    .form-actions {
        display: flex;
        gap: 10px;
        margin-top: 30px;
    }
</style>

<div class="form-container">
    <h2>게시글 작성</h2>
    
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="title">제목</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="content">내용</label>
            <textarea id="content" name="content" required>{{ old('content') }}</textarea>
            @error('content')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn">작성하기</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">취소</a>
        </div>
    </form>
</div>
@endsection
