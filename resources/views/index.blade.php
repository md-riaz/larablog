@extends('layouts.layout')
@section('title' ,'larablog | A laravel blog')

@section('content')
<!--   Main Post Section -->
<section class="post-list">
    @forelse ($posts as $post)
    <div class="posts">
        <div class="posts_contents_wrapper d_flex">
            <div class="posts_preview_img">
                <img src="{{ asset($post->post_img)}}" alt="preview_img">
            </div>
            <div class="posts_desc d_flex">
                <div class="posts_title">
                    <div class="categories d_flex">
                        <a href="{{url('/categories/'.$post->category->slug)}}">{{$post->category->name}}</a>
                    </div>
                    <a class="title" href="{{ url('post/'. $post->slug) }}">
                        {{$post->title}}
                    </a>
                    <div class="info d_flex">
                        <p class="date">{{$post->created_at->format('d F, Y')}}</p>
                        <p class="author">by <a href="{{url('user/'.$post->user->id.'/posts')}}">{{$post->user->name}}</a></p>
                    </div>
                </div>
                <p class="text_contents">
                    {{Str::limit(strip_tags($post->details), 300)}}
                    <br>
                    <a class="read_more" href="{{ url('post/'. $post->id) }}">...</a>
                </p>
            </div>
        </div>
        <div class="post_buttons d_flex">
            <div class="comments d_flex">
                <i class="far fa-comment"></i>
                <p>24</p>
            </div>
            <div class="post_share">
                <span>Share</span>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#" onclick="event.preventDefault();copyToClipboard('{{ url('post/'. $post->slug) }}');" id="copy"><i class="far fa-clipboard"></i></a>
                <input type="text" id="url" value="{{ url('post/'. $post->slug) }}" style="position:absolute;left:99999999px">
            </div>
        </div>
    </div>
    @empty
    <p class="text-center">No articles to show</p>
    @endforelse

    @if ($posts instanceof \Illuminate\Pagination\LengthAwarePaginator))
    <nav class="pagination">
        <div class="page-links">
            <a class="prev page-numbers {{$posts->previousPageUrl()==null ? 'd-none' : ''}}" href="{{$posts->previousPageUrl()}}">previews</a>

            @for ($i = 1; $i < $posts->lastPage()+1; $i++)
                <a class="page-numbers {{$posts->currentPage() == $i ? 'current' : '' }}" href=" {{$posts->url($i)}}">{{$i}}</a>
                @endfor

                <a class="next page-numbers {{$posts->previousPageUrl()==null ? "d-none" : ""}}" href="{{$posts->nextPageUrl()}}">next</a>
        </div>

    </nav>
    @endif


</section>
@endsection

