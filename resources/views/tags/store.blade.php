@extends('layouts.layout')
@section('title' ,'Tags')

@section('content')

    <div class="container">
        <div class="row write-tag">
            <div class="post-comments col-12">
                <h2 class="comments-title">Add a new tag here.</h2>
                <div class="comment-respond">
                    <form action="{{route('tags.store')}}" method="post">
                        @csrf
                        <div class="d_flex">
                            <div class="input-field" style="width:100%">
                                <input type="text" name="name" placeholder="Tag Name *" aria-required="true"/>
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
                            <input name="submit" type="submit" class="submit" value="Add Tag" required/>
                        </p>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table>
                    <tr>
                        @foreach ($tags as $tag)

                        <td>{{$tag->name}}</td>
                        @endforeach
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection

