@extends('blog.theme.cleanBlog.master')

@section('content')
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">

            @if(isset($posts) && count($posts) > 0)
                @foreach($posts as $post )
                <div class="post-preview">
                    <a href="{{ url('/posts', ['id' => $post->id]) }}">
                        <h2 class="post-title">
                            {{ $post->title }}
                        </h2>
                        <h3 class="post-subtitle">
                            {{ $post->description }}
                        </h3>
                    </a>

                    <p class="post-meta">Posted by <a href="#">{{ $post->author }}</a> {{ $post->published_at }}</p>

                </div>
                <hr>
                @endforeach
            @else
                <h2>暂无文章</h2>
                <hr>
            @endif

            <!-- Pager -->
            <div class="clearfix">
                <a class="btn btn-secondary float-right" href="#">Older Posts &rarr;</a>
            </div>
        </div>
    </div>
</div>

    @endsection



