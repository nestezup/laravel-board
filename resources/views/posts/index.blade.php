@extends('posts.layout')

@section('title', '게시글 목록')

@section('content')
<style>
    .header-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    .posts-table {
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th {
        background-color: #f8f9fa;
        padding: 15px;
        text-align: left;
        font-weight: 600;
        border-bottom: 2px solid #dee2e6;
    }
    td {
        padding: 15px;
        border-bottom: 1px solid #dee2e6;
    }
    tr:hover {
        background-color: #f8f9fa;
    }
    .post-title {
        color: #007bff;
        text-decoration: none;
        font-weight: 500;
    }
    .post-title:hover {
        text-decoration: underline;
    }
    .pagination {
        margin-top: 20px;
        text-align: center;
    }
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background-color: white;
        border-radius: 8px;
    }
    .empty-state p {
        color: #6c757d;
        margin-bottom: 20px;
    }
</style>

<div class="header-actions">
    <h2>게시글 목록</h2>
    <a href="{{ route('posts.create') }}" class="btn">새 글 작성</a>
</div>

@if($posts->count() > 0)
    <div class="posts-table">
        <table>
            <thead>
                <tr>
                    <th style="width: 80px;">번호</th>
                    <th>제목</th>
                    <th style="width: 200px;">작성일</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post) }}" class="post-title">
                            {{ $post->title }}
                        </a>
                    </td>
                    <td>{{ $post->created_at->format('Y-m-d H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="pagination">
        {{ $posts->links() }}
    </div>
@else
    <div class="empty-state">
        <p>아직 작성된 게시글이 없습니다.</p>
        <a href="{{ route('posts.create') }}" class="btn">첫 글 작성하기</a>
    </div>
@endif
@endsection
