@extends('layouts.layout')
@section('title' ,'All Category')

@section('content')


<table class="table table-responsive">
    <thead>
        <th>SL</th>
        <th>Category Name</th>
        <th>Slug</th>
        <th>Author</th>
        <th>Created at</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($categories as $row)
        <tr>
            <td>{{ $categories->firstItem() + $loop->index }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->slug }}</td>
            <td>{{ $row->user->name }}</td>
            <td>{{ $row->created_at->format('dS F, Y') }}</td>
            <td>
                <a href="{{ url('category/'. $row->id.'/edit') }}" class="btn text-primary"><i
                        class="far fa-edit"></i></a>
                <a href="{{ url('category/'. $row->id) }}" class="btn text-secondary"><i class="far fa-eye"></i></a>

                <form action="" id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn text-danger" id="delete"
                        data-action="{{ url('category/'. $row->id) }}"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@if ($categories instanceof \Illuminate\Pagination\LengthAwarePaginator)
<nav class="pagination">
    <div class="page-links">
        <a class="prev page-numbers {{$categories->previousPageUrl()==null ? 'd-none' : ''}}"
            href="{{$categories->previousPageUrl()}}">previews</a>

        @for ($i = 1; $i < $categories->lastPage()+1; $i++)
            <a class="page-numbers {{$categories->currentPage() == $i ? 'current' : '' }}"
                href=" {{$categories->url($i)}}">{{$i}}</a>
            @endfor

            <a class="next page-numbers {{$categories->previousPageUrl()==null ? 'd-none' : ''}}"
                href="{{$categories->nextPageUrl()}}">next</a>
    </div>

</nav>
@endif
@endsection
