@extends('rolelayout')
@section('content')

    <h1>Role Management</h1>
    <a href="{{ route('role.create') }}" class="btn btn-primary float-right">Create New Role</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->name }}</td>
                <td><a href="role/{{$item->id}}"><i class="fa fa-eye"></i></a></td>
                <td><a href="/role/{{$item->id}}/edit"><i class="fa fa-edit"></i></a></td>

                <form action="/role/{{$item->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <td><button type="submit"><i class="fa fa-trash"></i></td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection