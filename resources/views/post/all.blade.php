@extends('layouts.layout')

@section('title' ,'All Posts')

@section('content')

<table class="table table-responsive">
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
            <td>{{Str::limit($row->title, 25)}}</td>
            <td>{{ $row->user->name }}</td>
            <td>{{ $row->category->name }}</td>
            <td><img src="{{asset($row->post_img)}}" alt="" width="80" height="50"></td>
            <td>
                <a href="{{ url('post/'. $row->id.'/edit') }}" class="btn table-primary"><i class="far fa-edit"></i></a>
                <a href="{{ url('post/'. $row->slug) }}" class="btn text-secondary"><i class="far fa-eye"></i></a>

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

@if ($posts instanceof \Illuminate\Pagination\LengthAwarePaginator)
<nav class="pagination">
    <div class="page-links">
        <a class="prev page-numbers {{$posts->previousPageUrl()==null ? 'd-none' : ''}}"
            href="{{$posts->previousPageUrl()}}">previews</a>

        @for ($i = 1; $i < $posts->lastPage()+1; $i++)
            <a class="page-numbers {{$posts->currentPage() == $i ? 'current' : '' }}"
                href=" {{$posts->url($i)}}">{{$i}}</a>
            @endfor

            <a class="next page-numbers {{$posts->previousPageUrl()==null ? 'd-none' : ''}}"
                href="{{$posts->nextPageUrl()}}">next</a>
    </div>

</nav>
@endif

@endsection
