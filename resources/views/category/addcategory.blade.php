@extends('layouts.layout')
@section('title' ,'Add Category')

@section('content')

<div class="container">
    <div class="write-post">
        <div class="post-comments">
            <h2 class="comments-title">Add a new category here.</h2>
            <div class="comment-respond">
                <form action="{{ url('category') }}" method="post">
                    @csrf
                    <div class="d_flex">
                        <div class="input-field" style="width:100%">
                            <input type="text" name="name" placeholder="Category Name *" aria-required="true" />
                        </div>

                    </div>

                    {{-- Displaying The Validation Errors --}}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    {{-- Displaying The Validation Errors --}}

                    <p class="form-submit">
                        <input name="submit" type="submit" class="submit" value="Add Category" required />
                    </p>
                </form>
            </div>
            <!-- #respond -->
        </div>
    </div>
</div>
@endsection
