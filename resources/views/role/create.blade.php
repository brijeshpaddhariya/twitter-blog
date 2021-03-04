@extends('rolelayout')
@section('content')
    <h1>Role Create</h1>
    <form action="{{ route('role.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Name">
        </div>

        <label>select tag</label><br />
        @foreach ($permission as $item)
            <input type="checkbox" name="permission[]" value="{{ $item->id }}">
            <label>{{ $item->name }}</label><br />
        @endforeach<br />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

