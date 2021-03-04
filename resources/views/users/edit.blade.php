@extends('rolelayout')
@section('content')
    <h1>Edit Manage User</h1>
    <form action="{{ '/users/' . $users['id'] }}" method="POST" >
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Enter Name">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="Enter Email">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password"  class="form-control" placeholder="Enter Password">
        </div>
        <label>select Role:</label>
        
            <select class="ml-2" name="role[]" >
                @foreach ($role as $item)
                    <option >{{ $item->name }}</option>
                @endforeach
            </select>
        <br />

      
   
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection