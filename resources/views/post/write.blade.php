@extends('layouts.layout')
@section('title' ,'Write Post')

@section('content')

    <div class="container">
        <div class="write-post">
            <div class="post-comments">
                <h2 class="comments-title">Write a new post here.</h2>
                <div class="comment-respond">
                    <form action="{{ url('post') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="d_flex comment-double">
                            <div class="input-field">
                                <label for="title">Title</label>
                                <input type="text" name="title" placeholder="Post Title *" aria-required="true"
                                       required id="title" max="255"/>
                            </div>
                            <div class="input-field">
                                <label for="category">Category</label>
                                <select name="category_id" id="category">
                                    <option value="" disabled selected>Select a Category</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="input-field">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" placeholder="Slug/url*" aria-required="true"
                                   required max="100" id="slug"/>
                        </div>
                        <div class="input-field">
                            <label for="image">Feature Image</label>
                            <input type="file" name="post_img" id="image">
                        </div>

                        <div class="input-field">
                            <label for="post_desc">Post body</label>
                            <textarea name="details" rows="20" placeholder="Post Details *" aria-required="true"
                                      id="post_desc" style="height: auto;"></textarea>
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
                            <input name="submit" type="submit" class="submit" value="Submit your post" required/>
                        </p>
                    </form>
                </div>
                <!-- #respond -->
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://cdn.tiny.cloud/1/g4v6bvbx4urk83696i0550n97p3pmdnlda80zmyq6f88iu4w/tinymce/5/tinymce.min.js">
    </script>
    <script>
        tinymce.init({
            selector: 'textarea#post_desc',
            menubar: false,
            plugins: 'link code advlist lists table autosave anchor autolink emoticons media image imagetools preview print wordcount',
            toolbar: 'styleselect formatting forecolor backcolor align| link image media | numlist bullist emoticons table preview print code',
            toolbar_groups: {
                formatting: {
                    icon: 'bold',
                    tooltip: 'Formatting',
                    items: 'bold italic underline | superscript subscript'
                }
            },
            branding: false,
            height: 500
        });
    </script>
@endsection
