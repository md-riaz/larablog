@extends('layouts.layout')
@section('title' ,'Admin Panel')

@section('content')
<div class="card">
    <div class="card-header">
        All Registered Users
    </div>
    <div class="card-body">
        <table class="table table-responsive">
            <thead>
                <th>SL</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Created at</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $users->firstItem() + $loop->index }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('dS F, Y') }}</td>
                    <td>
                        <a href="{{ url('users/'. $user->id.'/edit') }}" class="btn table-primary"><i
                                class="far fa-edit"></i></a>

                        <form action="" id="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn text-danger" id="delete"
                                data-action="{{ url('users/'. $user->id) }}"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$users->links()}}
    </div>
</div>
@endsection
