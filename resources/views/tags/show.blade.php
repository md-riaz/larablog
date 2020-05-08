@extends('layouts.layout')
@section('title' ,'Edit')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h2>{{  $tag->name }} Tag <span class="badge badge-secondary">{{ $tag->posts->count() }} Posts</span></h2>
        </div>
    </div>
@endsection
