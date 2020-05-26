@extends('layouts.manage')
@section('title' ,'Admin Panel')

@section('content')
    <div class="col-md-12 p-0">
        <h3>All Registered Users</h3>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                <th>SL</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Posts</th>
                <th>Comments</th>
                <th>Action</th>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $users->firstItem() + $loop->index }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->posts_count }}</td>
                        <td>{{ $user->comments_count }}</td>
                        <td>
                            <a href="{{ route('users.edit',$user->id) }}" class="btn table-primary"><i
                                    class="far fa-edit"></i></a>

                            <form action="" id="deleteForm" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn text-danger" id="delete"
                                        data-action="{{ route('users.destroy',$user->id) }}"><i
                                        class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <!-- pagination -->
        @if ($users->lastPage() > 1)
            {{ $users->links() }}
        @endif
        <!-- pagination End -->

        </div>
    </div>

@endsection
