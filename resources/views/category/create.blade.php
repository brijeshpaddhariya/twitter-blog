@extends('layout')

@section('content')
<h1>Create Categoery</h1>
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name"  class="form-control" placeholder="Enter Category Name">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection