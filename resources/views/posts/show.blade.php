@extends('layout')

@section('meta-title', $post->title)
@section('meta-description', $post->excerpt)

@section('content')
<article class="post container">
    @if ($post->photos->count() === 1)
        <figure>
            <img src="{{ $post->photos->first()->url }}"
                alt="{{ $post->title }}"
                class="img-responsive"
            >
        </figure>
    @elseif ($post->photos->count() > 1)
        @include('posts.carousel')
    @elseif ($post->iframe)
        <div class="video">
            {!! $post->iframe !!}
        </div>
    @endif
    <div class="content-post">
      <header class="container-flex space-between">
        <div class="date">
            <span class="c-gris">
                {{ $post->published_at->diffForHumans() }}
            </span>
        </div>
        <div class="post-category">
            <span class="category">
                {{ $post->category->name }}
            </span>
        </div>
      </header>
      <h1>{{ $post->title }}</h1>
        <div class="divider"></div>
        <div class="image-w-text">
            {!! $post->body !!}
        </div>

        <footer class="container-flex space-between">
            @include('partials.social-links', ['description' => $post->title])
            <div class="tags container-flex">
            @foreach ($post->tags as $tag)
                <span class="tag c-gris text-capitalize">
                    #{{ $tag->name }}
                </span>
            @endforeach
            </div>
        </footer>
        <div class="comments">
            <div class="divider"></div>
            <div id="disqus_thread"></div>
            @include('partials.disqus-script')
        </div>
        <!-- .comments -->
    </div>
</article>
@endsection

@push('styles')
	<link rel="stylesheet" href="/css/bootstrap.css">
@endpush

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
    <script src="/js/bootstrap.js"></script>
@endpush
