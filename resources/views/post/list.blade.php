@extends('layout')
@section('content')
<h1>Post List</h1>

<a href="/post/create" class="btn btn-primary float-right">Post Create</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Category_name</th>
            <th scope="col">Operation</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <th scope="row">{{ $item->id }}</th>
            <td>{{ $item->title }}</td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->category->name }}</td>
            <td><a href="/post/{{$item->id}}/edit"><i class="fa fa-edit"></i></a>
                <form action="post/{{$item->id}}" method="POST">
                    @csrf
                    @method('DELETE')
            <td><button type="submit"><i class="fa fa-trash"></i></td>
            </form>
        </tr>

        @endforeach
    </tbody>
</table>
@endsection