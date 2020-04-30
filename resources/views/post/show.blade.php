@extends('layouts.layout')
@section('title')
{{$post->title}}
@endsection

@section('content')
<section class="post-list">
    <div class="posts">
        <div class="posts_contents_wrapper d_flex">
            <div class="post_details d_flex">
                <div class="posts_title">
                    <div class="categories d_flex">
                        <a href="{{url('/categories/'.$post->category->slug)}}">{{$post->category->name}}</a>
                    </div>
                    <a class="title">
                        {{$post->title}}
                    </a>
                    <div class="info d_flex">
                        <p class="date">{{$post->created_at->format('jS F, Y')}}</p>
                        <p class="author">by <a
                                href="{{url('user/'.$post->user->id.'/posts')}}">{{$post->user->name}}</a></p>
                    </div>
                </div>
            </div>

            <div class="post_img">
                <img src="{{asset($post->post_img)}}" alt="preview_img" />
            </div>
            <div class="entry-content">

                {!! $post->details !!}

            </div>

        </div>
        <div class="post_buttons d_flex details_page">
            <div class="post_share">
                <span>Share</span>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-pinterest"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
            </div>
        </div>
    </div>
    <nav class="post-navigation d_flex">
        <div class="prev_post post_link">
            <a href="#" rel="prev">
                <span class="meta-nav">Previous Post</span>
                <div class="post-content">
                    <span class="title">
                        Dillon – CRITICS CALL HER A NEW BJORK!
                    </span>
                </div>
            </a>
        </div>
        <div class="next-post post_link">
            <a href="#" rel="prev">
                <span class="meta-nav">Next Post</span>
                <div class="post-content">
                    <span class="title">Dillon – CRITICS CALL HER A NEW BJORK!
                    </span>
                </div>
            </a>
        </div>
    </nav>
    <div class="post-comments">
        <h2 class="comments-title">0 Comments</h2>
        <div class="comment-respond">
            <h2 class="comment-reply-title">
                Leave a comment
            </h2>
            <form action="#!" method="post">
                @csrf
                @method('PUT')
                <p class="comment-notes">
                    Your email address will not be published.
                </p>
                <div class="input-field">
                    <textarea name="comment" placeholder="Your Comment *" aria-required="true"></textarea>
                </div>

                <div class="d_flex comment-double">
                    <div class="input-field">
                        <input type="text" name="author" placeholder="Name *" aria-required="true" />
                    </div>
                    <div class="input-field">
                        <input type="email" name="email" placeholder="Email *" aria-required="true" />
                    </div>
                </div>
                <p class="form-submit">
                    <input name="submit" type="submit" class="submit" value="Post Your Comment" />
                </p>
            </form>
        </div>
        <!-- #respond -->
    </div>
</section>
@endsection
