@extends('layouts.layout')

@section('title' ,'All Posts')

@section('content')
    <div class="col p-0">

        <!-- Table title -->
        <div class="d-flex justify-content-between mb-3">
            <h3 class="mb-0">Posted by author's</h3>
            <a href="{{ route('post.create') }}" class="btn bg-sienna text-white">Write</a>
        </div>
        <!-- Table title End -->

        <!-- Data Table -->
        <div class="table-responsive text-nowrap">
            <table class="table table--striped ">
                <thead>
                <th>SL</th>
                <th>Post Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Image</th>
                <th>Action</th>
                </thead>
                <tbody>
                @forelse ($posts as $row)
                    <tr>
                        <td>
                            {{ $posts->firstItem() + $loop->index }}
                        </td>
                        <td>
                            <a href="{{ url('post/'. $row->slug) }}">{{Str::limit($row->title, 25)}}</a>
                        </td>
                        <td>
                            <a href="{{ url('user/'.$row->user->id.'/posts') }}">{{ $row->user->name }}</a>
                        </td>
                        <td>
                            <a href="{{url('/categories/'.$row->category->slug)}}">{{ $row->category->name }}</a>
                        </td>
                        <td>
                            <img data-src="{{asset($row->post_img)}}" class="lazyload" loading="lazy" alt="post thumb"
                                 width="80" height="50">
                        </td>
                        <td>
                            <a href="{{ url('post/'. $row->id.'/edit') }}" class="btn table-primary"><i
                                    class="far fa-edit"></i></a>

                            <form action="" id="deleteForm" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn text-danger" id="delete"
                                        data-action="{{ url('post/'. $row->id) }}"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10">No data to show</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <!-- Data Table End -->
            <!-- pagination -->
        @if ($posts->lastPage() > 1)
            {{ $posts->links() }}
        @endif
        <!-- pagination End -->
        </div>
    </div>
@endsection
