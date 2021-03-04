@extends('rolelayout')
@section('content')
    <h1>User Create</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Name">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter Email">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password">
        </div>


        <label>select Role:</label>
        
            {{-- <label></label> --}}
            <select class="ml-2" name="role[]">
                @foreach ($role as $item)
                    <option>{{ $item->name }}</option>
                @endforeach
            </select>
        <br />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

