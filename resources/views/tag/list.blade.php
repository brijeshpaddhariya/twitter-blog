@extends('layout')
@section('content')
<h1>Tag List</h1>



<a href="/tag/create" class="btn btn-primary float-right">Tag Create</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Operation</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach ($data as $item)
        <tr>
            <th scope="row">{{ $item->id }}</th>
            <td>{{ $item->name }}</td>
            <td><a href="/tag/{{$item->id}}/edit"><i class="fa fa-edit"></i></a></td>
            <form action="tag/{{$item->id}}" method="POST">
                @csrf
                @method('DELETE')
                <td><button type="submit"><i class="fa fa-trash"></i></td>
            </form>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection