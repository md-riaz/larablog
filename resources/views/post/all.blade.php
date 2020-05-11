@extends('layouts.layout')

@section('title' ,'All Posts')

@section('content')
    <div class="col p-0">
        <h3>Posted by author's</h3>
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
                        <td>{{ $posts->firstItem() + $loop->index }}</td>
                        <td><a href="{{ url('post/'. $row->slug) }}">{{Str::limit($row->title, 25)}}</a></td>
                        <td>{{ $row->user->name }}</td>
                        <td>{{ $row->category->name }}</td>
                        <td><img src="{{asset($row->post_img)}}" alt="" width="80" height="50"></td>
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

            <!-- pagination -->
        @if ($posts->lastPage() > 1)
            {{ $posts->links() }}
        @endif
        <!-- pagination End -->
        </div>
    </div>
@endsection
