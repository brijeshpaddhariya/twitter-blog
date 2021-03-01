@extends('layout')

@section('content')


    <h1>Edit Category</h1>
    <form action="{{ '/category/' . $data['id'] }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="name" name="name" value="{{$data->name}}" class="form-control" placeholder="Enter Category Name">
        </div>
       

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

