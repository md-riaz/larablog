@extends('layouts.layout')
@section('title' ,'Edit')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h2>{{  $tag->name }} Tag <span class="badge badge-secondary">{{ $tag->posts->count() }} Posts</span></h2>
        </div>
        <div class="col-md-2">
            <a class="btn btn-primary" href="{{ route('tag.edit', $tag->id) }}">Edit</a>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Tags</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tag->posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td><a href="{{ route('post.show', $post->slug) }}"> {{ $post->title }}</a></td>
                        <td>
                            @foreach ($post->tags as $tag)
                                <span class="badge badge-dark">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
